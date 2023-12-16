<?php
header("Content-Type: application/javascript; charset=utf-8");
header("Service-Worker-Allow: /");
?>/* In order to get the listed resources below to load properly once moved to Amazon's CloudFront servers you need to add this to your S3 bucket, under Permissions/CORS configuration:

<    ?xml version="1.0" encoding="UTF-8"?>
<CORSConfiguration xmlns="http://s3.amazonaws.com/doc/2006-03-01/">
	<CORSRule>
		<AllowedOrigin>https://PUTYOURDOMAINNAMEHERE.com</AllowedOrigin>
		<AllowedMethod>GET</AllowedMethod>
		<MaxAgeSeconds>3000</MaxAgeSeconds>
		<AllowedHeader>Authorization</AllowedHeader>
	</CORSRule>
</CORSConfiguration>


Then you need to select the appropriate distribution under CloudFront and click the Behaviors tab.  Create or Edit an existing Behavior and select the following settings:

Allowed HTTP Methods: GET, HEAD, OPTIONS

Enable 'Cached HTTP Methods': GET, HEAD and OPTIONS
NOTE: THIS IS A MAYBE, I HAVE TO LEARN MORE ABOUT THIS Setting

Cache Based on Selected Request Headers: Whitelist
Add these to the right box under Whitelist Headers, add as custom if necessary:
	Access-Control-Allow-Origin
	Access-Control-Request-Headers
	Access-Control-Request-Method
	Origin

Then click the 'Yes, Edit' button at the bottom and give it about 10 minutes to propagate through the system and test using Chrome.
*/

const cacheName = '2023-06-20.v3';

/* Point this array item to your own 'offline' template if you plan on removing the 'examples' folder in your own development. */
var cacheFiles = [
'/{CCMS_LIB:_default.php;FUNC:ccms_lng}/examples/offline.html',
'/{CCMS_LIB:_default.php;FUNC:ccms_lng}/examples/manifest.php'
];

/*
Analytics and Service Worker:
https://developers.google.com/web/ilt/pwa/integrating-analytics#analytics_and_service_worker
self.importScripts('/ccmstpl/examples/_js/analytics-helper.js');

Important resources used in the assembly of this services code:
https://googlechrome.github.io/samples/service-worker/custom-offline-page/
https://developers.google.com/web/updates/2017/02/navigation-preload
*/

self.addEventListener('install',(event) => {
	event.waitUntil((async() => {
		const cache = await caches.open(cacheName).then(cache => {
			return cache.addAll(cacheFiles);
		})
	})());
});


self.addEventListener('activate',(event) => {
	event.waitUntil((async() => {
		caches.keys().then(keyList => {
			return Promise.all(keyList.map(key => {
				if(key !== cacheName) return caches.delete(key);
			}));
		})
	})());
});


self.addEventListener('fetch',(event) => {
	console.log('SW fetch event.', event.request.method, event.request.url);
	/*
		This example demonstrates how to avoid doing a serviceWorker cache of templates if they are coming from WordPress folders, Google RECAPTCHA or the CustodianCMS 'user' folder/admin.
		if(!/\/wp\-(.*)|\/recaptcha\/|(\/(([a-z]{2,3})(-[a-z0-9]{2,3})?)\/user\/)/i.test(event.request.url)) {
	*/
	if(!/\/recaptcha\/|(\/(([a-z]{2,3})(-[a-z0-9]{2,3})?)\/user\/)/i.test(event.request.url)){
		event.respondWith(
			caches.open(cacheName).then(cache => {
				return cache.match(event.request).then(response => {
					/*
						Go here to learn more about cors:
						https://jakearchibald.com/2015/thats-so-fetch/#no-cors-and-opaque-responses
						or
						https://developers.google.com/web/fundamentals/primers/service-workers/#non-cors_fail_by_default
						const fetchResponse = await fetch(event.request, {mode:'cors'});
						const fetchResponse = await fetch(event.request, {mode:'no-cors'});
						const fetchResponse = await fetch(event.request, {mode:'immutable'});
					*/
					const fetchPromise = fetch(event.request).then(networkResponse => {
						/* Makesure never to cache a failed page call. */
						if(networkResponse.status === 404) {
							return networkResponse;
						}
						cache.put(event.request, networkResponse.clone());
						return networkResponse;
					});
					return response || fetchPromise;
				}).catch(function() {
					/* The template being called was not found in cache and there is no internet connection at the moment so display the offline page instead.  The code below makes sure we're dispalying the appropriate offline template for the language that's currently selected by the client. */
					const regex = /\/(([a-z]{2,3})(-[a-z0-9]{2,3})?)\//i;
					const lng = event.request.url.match(regex);
					const searchForThis = '/' + lng[1] + '/examples/offline.html';
					return caches.match(searchForThis);
				})
			})
		);
	} else {
		/* This request appears to be for a Google RECAPTCHA URL or the CustodianCMS '/user/' dir, so don't cache it. Keep it fresh and always comming from the source. */
		event.respondWith(fetch(event.request));
	}
});











/*
// On fetch, use cache but update the entry with the latest contents
// from the server.
self.addEventListener('fetch', function(e) {
  console.log('The service worker is serving the asset.');
  // You can use `respondWith()` to answer ASAP...
  e.respondWith(fromCache(e.request));
  // ...and `waitUntil()` to prevent the worker to be killed until
  // the cache is updated.
  e.waitUntil(
    update(e.request)
    // Finally, send a message to the client to inform it about the
    // resource is up to date.
    .then(refresh)
  );
});


// Open the cache where the assets were stored and search for the requested
// resource. Notice that in case of no matching, the promise still resolves
// but it does with `undefined` as value.
function fromCache(request) {
  return caches.open(cacheName).then(function (cache) {
    return cache.match(request);
  });
}


// Update consists in opening the cache, performing a network request and
// storing the new response data.
function update(request) {
  return caches.open(cacheName).then(function (cache) {
    return fetch(request).then(function (response) {
      return cache.put(request, response.clone()).then(function () {
        return response;
      });
    });
  });
}


// Sends a message to the clients.
function refresh(response) {
  return self.clients.matchAll().then(function (clients) {
    clients.forEach(function (client) {
      // Encode which resource has been updated. By including the
      // [ETag](https://en.wikipedia.org/wiki/HTTP_ETag) the client can
      // check if the content has changed.
      var message = {
        type: 'refresh',
        url: response.url,
        // Notice not all servers return the ETag header. If this is not
        // provided you should use other cache headers or rely on your own
        // means to check if the content has changed.
        eTag: response.headers.get('ETag')
      };
      // Tell the client about the update.
      client.postMessage(JSON.stringify(message));
    });
  });
}
*/
