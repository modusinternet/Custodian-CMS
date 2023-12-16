<?php
header("Content-Type: application/javascript; charset=utf-8");
header("Service-Worker-Allow: /");
?>

const cacheName = '2023-06-20.v4';

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


/*
Cache, update and refresh
Another twist on the previous strategy, now with a refreshing ingredient.
With cache, update and refresh the client will be notified by the service worker once new content is available. This way your site can show content without waiting for the network responses, while providing the UI with the means to display up-to-date content in a controlled way.
*/

self.addEventListener('fetch', function(evt) {
  console.log('SW fetch evt.', evt.request.method, evt.request.url);
	evt.respondWith(fromCache(evt.request));
  evt.waitUntil(
    update(evt.request)
    .then(refresh)
  );
});

function fromCache(request) {
  return caches.open(cacheName).then(function (cache) {
    return cache.match(request).then(function (matching) {
      return matching || Promise.reject('no-match');
    });
  });
}

function update(request) {
  return caches.open(cacheName).then(function (cache) {
    return fetch(request).then(function (response) {
      return cache.put(request, response);
    });
  });
}

function refresh(response) {
  return self.clients.matchAll().then(function (clients) {
    clients.forEach(function (client) {
      var message = {
        type: 'refresh',
        url: response.url,
        eTag: response.headers.get('ETag')
      };
      client.postMessage(JSON.stringify(message));
    });
  });
}
