# Kirby 3 Plugin Starterkit

Clone this repo with ```$ git clone https://github.com/wearecandyblue/kirby3-plugin.git <your-new-project-directory>```


$ git submodule add https://github.com/wearecandyblue/kirby3-manifest.git site/plugins/manifest


Place this in head
```$ <?php echo Html::tag('link', null, ["rel" => "manifest", "href" => u('/manifest.json')]).PHP_EOL ?>```
<?= manifest() ?>

/site/config/config.php
<?php

return [
    'ready' => function() {
        return [
            'my.option' => kirby()->root('index') . '/resources'
        ];
    }
];
