# Front-end-plugin som returnerar alla barn-sidor inkl navigationstext

## Hur man använder Region Hallands plugin "region-halland-page-children-navigation"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-page-children-navigation".


## Användningsområde

Denna plugin skapar en array() med alla barn-sidor, inkl information om navigationstexten ska visas


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell via den medföljande filen:
```sh
LICENSE (https://github.com/RegionHalland/region-halland-page-children-navigation/blob/master/LICENSE)
```

## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-page-children-navigation.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-page-children-navigation.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-page-children-navigation": "1.0.0"
},
```


## Loopa ut sidorna via "Blade"

```sh
@if(function_exists('get_region_halland_page_children_navigation'))
  @php($myPages = get_region_halland_page_children_navigation())
  @if(isset($myPages['pages']))
    @foreach ($myPages['pages'] as $page)
      <a href="{{ $page->url }}">{{ $page->post_title }}</a><br>
      @if($myPages['statistic']['show-navigation'] == 1)
        <p>{{ $page->navigation }} </p>
      @endif
    @endforeach
  @endif
@endif
```

## Parametrar till funktionen get_region_halland_page_children_navigation()

Funktionen har två parametrar:

- page
- minPercent

Man kan anropa utan parameter enligt och då blir minPercent 25, dvs minst 25% av posterna måste ha en ifylld navigationstext.

```sh
@php($myPages = get_region_halland_page_children_navigation())
```

OBS! Vill man själv välja vilken minPercent man vill använda genom att anropa funktionen med detta värde. I exemplet nedan vill man att minst 50% av posterna ska ha en ifylld navigationstext.

```sh
@php($myPages = get_region_halland_page_children_navigation(50))
```

Om antal poster uppfyller minPercent så sätts variabeln show-navigation till 1, annars 0.


## Exempel på hur arrayen kan se ut

```sh
array (size=2)
  'statistic' => 
    array (size=4)
      'antal' => int 2
      'antal-navigation' => int 1
      'procent-navigation' => int 50
      'show-navigation' => int 1
  'pages' => 
    array (size=2)
      0 => 
        object(WP_Post)[6917]
          public 'ID' => int 25
          public 'post_author' => string '1' (length=1)
          public 'post_date' => string '2018-11-22 11:34:55' (length=19)
          public 'post_date_gmt' => string '2018-11-22 10:34:55' (length=19)
          public 'post_content' => string 'Pretium sed tempor nisl ut accumsan.' (length=36)
          public 'post_title' => string 'Pretium sed tempor' (length=18)
          public 'post_excerpt' => string '' (length=0)
          public 'post_status' => string 'publish' (length=7)
          public 'comment_status' => string 'closed' (length=6)
          public 'ping_status' => string 'closed' (length=6)
          public 'post_password' => string '' (length=0)
          public 'post_name' => string 'pretium-sed-tempor' (length=18)
          public 'to_ping' => string '' (length=0)
          public 'pinged' => string '' (length=0)
          public 'post_modified' => string '2019-03-13 13:30:40' (length=19)
          public 'post_modified_gmt' => string '2019-03-13 12:30:40' (length=19)
          public 'post_content_filtered' => string '' (length=0)
          public 'post_parent' => int 9
          public 'guid' => string 'http://exempel.se/vestibulum-ante-ipsum/etiam-pulvinar-felis/' (length=61)
          public 'menu_order' => int 0
          public 'post_type' => string 'page' (length=4)
          public 'post_mime_type' => string '' (length=0)
          public 'comment_count' => string '0' (length=1)
          public 'filter' => string 'raw' (length=3)
          public 'acf_excerpt' => null
          public 'url' => string 'http://exempel.se/etiam-dictum-enim/pretium-sed-tempor/' (length=53)
          public 'image' => string '<img width="400" height="180" src="http://exempel.se/app/uploads/2018/11/nyhet_2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="http://stage-demo.local/app/uploads/2018/11/nyhet_2.jpg 400w, http://exempel.se/app/uploads/2018/11/nyhet_2-300x135.jpg 300w" sizes="(max-width: 400px) 100vw, 400px" />' (length=347)
          public 'image_url' => string 'http://exempel.se/app/uploads/2018/11/nyhet_2.jpg' (length=49)
      1 => 
        object(WP_Post)[6918]
          public 'ID' => int 27
          public 'post_author' => string '1' (length=1)
          public 'post_date' => string '2018-11-22 11:35:44' (length=19)
          public 'post_date_gmt' => string '2018-11-22 10:35:44' (length=19)
          public 'post_content' => string 'Aliquam eros elit, mollis a ipsum eu.' (length=40)
          public 'post_title' => string 'Mattis semper nibh' (length=18)
          public 'post_excerpt' => string '' (length=0)
          public 'post_status' => string 'publish' (length=7)
          public 'comment_status' => string 'closed' (length=6)
          public 'ping_status' => string 'closed' (length=6)
          public 'post_password' => string '' (length=0)
          public 'post_name' => string 'mattis-semper-nibh' (length=18)
          public 'to_ping' => string '' (length=0)
          public 'pinged' => string '' (length=0)
          public 'post_modified' => string '2018-11-30 16:43:52' (length=19)
          public 'post_modified_gmt' => string '2018-11-30 15:43:52' (length=19)
          public 'post_content_filtered' => string '' (length=0)
          public 'post_parent' => int 9
          public 'guid' => string 'http://exempel.se/vestibulum-ante-ipsum/duis-eu-odio/' (length=53)
          public 'menu_order' => int 0
          public 'post_type' => string 'page' (length=4)
          public 'post_mime_type' => string '' (length=0)
          public 'comment_count' => string '0' (length=1)
          public 'filter' => string 'raw' (length=3)
          public 'acf_excerpt' => null
          public 'url' => string 'http://exempel.se/etiam-dictum-enim/mattis-semper-nibh/' (length=55)
          public 'image' => string '' (length=0)
          public 'image_url' => boolean false
```


## Versionhistorik

### 1.1.0
- Uppdaterat med information om licensmodell
- Bifogat fil med licensmodell

### 1.0.0
- Första version