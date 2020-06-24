<?php
function manifest($r = '/manifest.json') {
  return Html::tag('link', null, ["rel" => "manifest", "href" => u($r)]).PHP_EOL;
}

Kirby::plugin('wearecandyblue/manifest', [
  // https://github.com/getkirby/kirby/issues/2343
  'options' => [
    'pattern' => 'manifest.json',
    'name' => site()->title()->escape(),
    'short_name' => site()->title()->escape(),
    'icon' => site()->icon()->toFile(),
    'dir' => 'ltr',
    'lang' => kirby()->language()->code(),
    'start_url' => './?utm_source=pwa',
    'display' => 'fullscreen',
    'background_color' => '#fff',
    'theme_color' => '',
    'description' => site()->description()->escape(),
    'orientation' => 'portrait',
    'scope' => '/',
  ],
  'routes' => function ($kirby) {
    return [
      [
        'pattern' => option('wearecandyblue.manifest.pattern', 'manifest.json'),
        'action' => function () {
          return [
            'name' => (string)option('wearecandyblue.manifest.name'),
            'short_name' => (string)option('wearecandyblue.manifest.short_name'),
            'dir' => (string)option('wearecandyblue.manifest.dir'),
            'lang' => (string)option('wearecandyblue.manifest.lang'),
            'start_url' => (string)option('wearecandyblue.manifest.start_url'),
            'display' => (string)option('wearecandyblue.manifest.display'),
            'background_color' => (string)option('wearecandyblue.manifest.background_color'),
            'description' => (string)option('wearecandyblue.manifest.description'),
            'background_color' => (string)option('wearecandyblue.manifest.background_color'),
            'theme_color' => (string)option('wearecandyblue.manifest.background_color'),

            //64
            //128
            //192x192
            //512x512
            'icons'   =>
              [
                [
                  'src' => (string)option('wearecandyblue.manifest.icon')->resize('192')->url(),
                  'sizes' => (string)preg_replace("/\s+/", "", option('wearecandyblue.manifest.icon')->resize('192')->dimensions()),
                  'type' => (string)option('wearecandyblue.manifest.icon')->mime()
                ],
                [
                  'src' => (string)option('wearecandyblue.manifest.icon')->resize('512')->url(),
                  'sizes' => (string)preg_replace("/\s+/", "", option('wearecandyblue.manifest.icon')->resize('512')->dimensions()),
                  'type' => (string)option('wearecandyblue.manifest.icon')->mime()
                ],
              ],

            'orientation' => (string)option('wearecandyblue.manifest.orientation'),
            //'related_applications' => ['platform' => '', 'url' => '', 'id' => ''],
            'scope' => (string)option('wearecandyblue.manifest.scope'),
          ];
        }
      ]
    ];
  }
]);

/*
option('someOtherOption', 'my fallback');
*/


/*



{
  "name": "HackerWeb",
  "short_name": "HackerWeb",
  "start_url": ".",
  "display": "standalone",
  "background_color" : "#fff" ,
  "description": "Eine einfach lesbare Hacker News App.",
  "icons": [{
    "src": "images/touch/homescreen48.png",
    "sizes": "48x48",
    "type": "image/png"
  }, {
    "src": "images/touch/homescreen72.png",
    "sizes": "72x72",
    "type": "image/png"
  }, {
    "src": "images/touch/homescreen96.png",
    "sizes": "96x96",
    "type": "image/png"
  }, {
    "src": "images/touch/homescreen144.png",
    "sizes": "144x144",
    "type": "image/png"
  }, {
    "src": "images/touch/homescreen168.png",
    "sizes": "168x168",
    "type": "image/png"
  }, {
    "src": "images/touch/homescreen192.png",
    "sizes": "192x192",
    "type": "image/png"
  }],
  "related_applications": [{
    "platform": "Web"
  }, {
    "platform": "play",
    "url": "https://play.google.com/store/apps/details?id=cheeaun.hackerweb"
  }]
}

{
    "name": "PWA-DEMO",
    "short_name": "PWA-DEMO",
    "lang": "de-DE",
    "start_url": "/index.html",
    "display": "standalone",
    "theme_color": "#e30613",
    "background_color": "#ffffff",
    "icons": [
      {
        "src": "pwa-demo.png",
        "sizes": "512x512",
        "type": "image\/png"
      },
        {
        "src": "pwa-demo-smaller.png",
        "sizes": "192x192",
        "type": "image\/png"
      }
    ]
}

{
  "name": "Donate App",
  "description": "This app helps you donate to worthy causes.",
  "icons": [{
    "src": "images/icon.png",
    "sizes": "192x192"
  }]
}

{
  "lang": "en",
  "dir": "ltr",
  "name": "Super Racer 3000",
  "description": "The ultimate futuristic racing game from the future!",
  "short_name": "Racer3K",
  "icons": [{
    "src": "icon/lowres.webp",
    "sizes": "64x64",
    "type": "image/webp"
  },{
    "src": "icon/lowres.png",
    "sizes": "64x64"
  }, {
    "src": "icon/hd_hi",
    "sizes": "128x128"
  }],
  "scope": "/racer/",
  "start_url": "/racer/start.html",
  "display": "fullscreen",
  "orientation": "landscape",
  "theme_color": "aliceblue",
  "background_color": "red",
  "screenshots": [{
    "src": "screenshots/in-game-1x.jpg",
    "sizes": "640x480",
    "type": "image/jpeg"
  },{
    "src": "screenshots/in-game-2x.jpg",
    "sizes": "1280x920",
    "type": "image/jpeg"
  }]
}

*/
