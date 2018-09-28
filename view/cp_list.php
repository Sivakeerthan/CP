<?php session_start(); if(isset($_SESSION['uid'])):?>
    <div class="card navbar-left">
        <div id="logo">
            <a href="/user/logout"><img src="/images/Logo.png"/></a>
        </div>
        <nav>
            <ul>
                <li><a href="/cp/liste">Liste</a></li>
                <li><a href="/cp/a_la_carte">À la Carte Menü</a></li>
                <li><a href="/cp/tagesmenu">Tages Menü</a></li>
            </ul>
        </nav>
    </div>
    <div class="card cp-container">
        <div class="cp-liste">
            <?php foreach ($categories AS $category): ?>
                <div class="col">
                    <h3><?=$category->name?></h3>
                    <?php foreach ($subcat AS $scat):
                        if($scat->cat_id == $category->catid):?>
                        <div class="list-scat col">
                            <h4><?=$scat->name?></h4>
                            <?php foreach ($menus AS $menu):
                                if($menu->cat_id == $scat->scatid):?>
                            <div class="list-men row"><h5><?=$menu->name?></h5>
                                <p><?=$menu->descr?></p>
                                <p><?=$menu->price?></p>
                                <div class="right">
                                    <a href="/cp/editALC?id=<?=$menu->alcid?>"><i class="material-icons">edit</i></a>
                                    <a href="/cp/deleteALC?id=<?=$menu->alcid?>"><i class="material-icons">delete</i></a>
                                </div>
                            </div>
                            <?php endif; endforeach;?>
                        </div>
                        <?php endif; endforeach;?>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?php else:?>
<h1 class="center">Acces Denied!</h1>
<?php endif;?>