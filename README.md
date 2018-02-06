# persentase-kondisi-kelas-baik-sma-ma

[![Join the chat at https://gitter.im/persentase-kondisi-kelas-baik-sma-ma/Lobby](https://badges.gitter.im/persentase-kondisi-kelas-baik-sma-ma/Lobby.svg)](https://gitter.im/persentase-kondisi-kelas-baik-sma-ma/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/persentase-kondisi-kelas-baik-sma-ma/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/persentase-kondisi-kelas-baik-sma-ma/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/persentase-kondisi-kelas-baik-sma-ma/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/persentase-kondisi-kelas-baik-sma-ma/build-status/master)

Persentase Kondisi Kelas Baik (KKB);SMA/MA Menurut Kabupaten/Kota

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/persentase-kondisi-kelas-baik-sma-ma:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/persentase-kondisi-kelas-baik-sma-ma:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/persentase-kondisi-kelas-baik-sma-ma.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\PerKKBSmaMa\PerKKBSmaMaServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=persentase-kondisi-kelas-baik-sma-ma-assets
$ php artisan vendor:publish --tag=persentase-kondisi-kelas-baik-sma-ma-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/persentase-kondisi-kelas-baik-sma-ma',
    components: {
      main: resolve => require(['./components/views/bantenprov/persentase-kondisi-kelas-baik-sma-ma/DashboardPerKKBSmaMa.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Persentase Kondisi Kelas Baik (KKB)"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/persentase-kondisi-kelas-baik-sma-ma',
      components: {
        main: resolve => require(['./components/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Persentase Kondisi Kelas Baik (KKB)"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Persentase Kondisi Kelas Baik (KKB)',
          link: '/dashboard/persentase-kondisi-kelas-baik-sma-ma',
          icon: 'fa fa-angle-double-right'
        }
  ]
},

```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import PerKKBSmaMa from './components/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMa.chart.vue';
Vue.component('echarts-persentase-kondisi-kelas-baik-sma-ma', PerKKBSmaMa);

import PerKKBSmaMaKota from './components/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaKota.chart.vue';
Vue.component('echarts-persentase-kondisi-kelas-baik-sma-ma-kota', PerKKBSmaMaKota);

import PerKKBSmaMaTahun from './components/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaTahun.chart.vue';
Vue.component('echarts-persentase-kondisi-kelas-baik-sma-ma-tahun', PerKKBSmaMaTahun);

import PerKKBSmaMaAdminShow from './components/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaAdmin.show.vue';
Vue.component('admin-view-persentase-kondisi-kelas-baik-sma-ma-tahun', PerKKBSmaMaAdminShow);

//== Echarts Angka Partisipasi Kasar

import PerKKBSmaMaBar01 from './components/views/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaBar01.vue';
Vue.component('persentase-kondisi-kelas-baik-sma-ma-bar-01', PerKKBSmaMaBar01);

import PerKKBSmaMaBar02 from './components/views/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaBar02.vue';
Vue.component('persentase-kondisi-kelas-baik-sma-ma-bar-02', PerKKBSmaMaBar02);

//== mini bar charts
import PerKKBSmaMaBar03 from './components/views/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaBar03.vue';
Vue.component('persentase-kondisi-kelas-baik-sma-ma-bar-03', PerKKBSmaMaBar03);

import PerKKBSmaMaPie01 from './components/views/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaPie01.vue';
Vue.component('persentase-kondisi-kelas-baik-sma-ma-pie-01', PerKKBSmaMaPie01);

import PerKKBSmaMaPie02 from './components/views/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaPie02.vue';
Vue.component('persentase-kondisi-kelas-baik-sma-ma-pie-02', PerKKBSmaMaPie02);

//== mini pie charts
import PerKKBSmaMaPie03 from './components/views/bantenprov/persentase-kondisi-kelas-baik-sma-ma/PerKKBSmaMaPie03.vue';
Vue.component('persentase-kondisi-kelas-baik-sma-ma-pie-03', PerKKBSmaMaPie03);
```

