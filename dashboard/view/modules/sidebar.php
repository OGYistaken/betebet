<div class="sidebar">
  <div class="sidebar-brand m-b-15">
    <a href="dashboard"><span class="text-600">Admin</span><span class="text-400 m-l-5">Panel</span></a>
    <div class="moonlight" onclick="switchTheme()">
      <i class="far fa-moon"></i>
    </div>
  </div>
  <div class="text-black text-uppercase text-medium text-600 m-b-15 p-l-20">Menü</div>
  <ul class="sidebar-nav" id="sidebar-nav">
    <li>
      <a href="general-settings">
        <span class="sidebar-nav-icon bg-primary-gradient"><i class="fas fa-cog text-tall"></i></span>
        Genel Ayarlar
      </a>
    </li>
    <li>
      <a href="accounts-settings">
        <span class="sidebar-nav-icon bg-green-gradient"><i class="fas fa-tachometer-alt text-tall"></i></span>
        Hesap Ayarları
      </a>
    </li>
    <li>
      <a href="banks">
        <span class="sidebar-nav-icon bg-sun-gradient"><i class="fas fa-university text-tall"></i></span>
        Bankalar
      </a>
    </li>
    <li class="dropdown">
      <a href="payments">
        <span class="sidebar-nav-icon bg-sky-gradient"><i class="fas fa-lira-sign text-tall"></i></span>
        Ödemeler
      </a>
      <ul class="dropdown-content">
        <li><a href="payments?type=cepbank">CepBank<span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from payments where status = 0 && type = 'cepbank'")->fetch_assoc()['num']?></span></a></li>
        <li><a href="payments?type=havale">Havale<span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from payments where status = 0 && type = 'havale'")->fetch_assoc()['num']?></span></a></li>
        <li><a href="payments?type=papara">Papara<span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from payments where status = 0 && type = 'papara'")->fetch_assoc()['num']?></span></a></li>
        <li><a href="payments?type=aninda-papara">Anında Papara<span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from payments where status = 0 && type = 'aninda-papara'")->fetch_assoc()['num']?></span></a></li>
        <li><a href="payments?type=cmt">Cmt Cüzdan<span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from payments where status = 0 && type = 'cmt'")->fetch_assoc()['num']?></span></a></li>
        <li><a href="payments?type=astropay">Astropay<span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from payments where status = 0 && type = 'astropay'")->fetch_assoc()['num']?></span></a></li>
        <li><a href="payments?type=paykasa">Paykasa<span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from payments where status = 0 && type = 'paykasa'")->fetch_assoc()['num']?></span></a></li>
        <li><a href="payments?type=bitcoin">Bitcoin<span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from payments where status = 0 && type = 'bitcoin'")->fetch_assoc()['num']?></span></a></li>
        <li><a href="payments?type=payfix">Payfix<span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from payments where status = 0 && type = 'payfix'")->fetch_assoc()['num']?></span></a></li>
      </ul>
    </li>
    <li class="dropdown">
      <a href="users">
        <span class="sidebar-nav-icon bg-orange-gradient"><i class="fas fa-user-friends text-tall"></i></span>
        Kullanıcılar
      </a>
      <ul class="dropdown-content">
        <li><a href="users">Yeni Gelen Kullanıcılar <span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(status) as num from users where status = 0")->fetch_assoc()['num']?></span></a></li>
        <li><a href="users?type=0">Giriş Yapan <span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from users where type = 0")->fetch_assoc()['num']?></span></a></li>
        <li><a href="users?type=1">Kayıt Olan <span class="counter text-white bg-red-gradient"><?=$db->query("SELECT count(id) as num from users where type = 1")->fetch_assoc()['num']?></span></a></li>
      </ul>
    </li>
    <li>
      <a href="limits">
        <span class="sidebar-nav-icon bg-primary"><i class="fas fa-coins text-tall"></i></span>
        Yatırım Limitleri
      </a>
    </li>
    <li>
      <a href="javascript:;" onclick="logOut()">
        <span class="sidebar-nav-icon bg-red-gradient"><i class="fas fa-sign-out-alt text-tall"></i></span>
        Çıkış Yap
      </a>
    </li>
  </ul>
</div>
