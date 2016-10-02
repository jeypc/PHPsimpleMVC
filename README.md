<b>Simple PHP MVC</b>
<p>Contoh sederhana PHP Native menggunakan konsep MVC (Model View Controller)</p>

<b>Konfigurasi Database</b>

Untuk konfigurasi database buka file
app/Config/database.ini

<pre>
  [MySql]
  host     = _host
  username = _username
  password = _password
  db_name  = _dbname
</pre>

<b>URL</b>

contoh url http://localhost/simplemvc/?c=home&m=test

c = merupakan nama controller, contoh HomeController. Aturan penulisan cukup dengan kata 'home' tanpa di akhiri dengan 'Controller'.

m = nama method dari controller tersebut.

<b>Controller</b>

Controller defaultnya yaitu app\Controller\HomeController.php
berisi 1 method index()
<code>
<pre>
  <?php
    namespace app\Controller;

    use system\core\Controller\BaseController as BaseController;
    use system\core\View\View as View;
    use app\Model\Model as Model;

    class HomeController extends BaseController {

      public function index(){
        return '<h1>Welcome</h1>';
      }

    }
  ?>
</pre>
</code>
Silahkan run dengan mengetik url http://localhost/namaprojectanda/ di browser anda.

Aturan penamaan class Controller:
- Harus di awali dengan huruf Kapital
- Diakhiri dengan kata 'Controller' tanpa dipisahkan dengan Spasi, ex: HomeController, KategoriController, AdminController dsb.

<b>Load view</b>

Bagaimana cara memanggil view di Controller?
Sangat simple, berikut contoh memanggil view dalam sebuah method

<pre>
<code>
  <?php
  
    namespace app\Controller;

    use system\core\Controller\BaseController as BaseController;
    use system\core\View\View as View;
    use app\Model\Model as Model;

    class HomeController extends BaseController {

      public function index(){
        return '<h1>Welcome</h1>';
      }
      
      public function test(){
        $data['nama'] = ['John', 'Doe'];
        
        View::load('test', $data);
      }

    }
  ?>
</code>
</pre>

Buat file baru di app/View/test.php

<pre>
<code>
  <?php print_r($nama); ?>
</code>
</pre>
