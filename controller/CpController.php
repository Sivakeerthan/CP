<?php
/**
 * Created by IntelliJ IDEA.
 * User: George
 * Date: 08.09.2018
 * Time: 15:48
 */
require_once '../repository/CatRepository.php';
class CpController
{
    public $err = array();
    public function index()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.

        $view = new View('cp_index');
        $view->title = 'Control Panel';
        $view->heading = 'CP';
        $view->display()    ;
    }
    public function tagesmenu()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.

        $view = new View('cp_tagmen');
        $view->title = 'Control Panel';
        $view->heading = 'CP';
        $view->display()    ;
    }
    public function a_la_carte()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.

        $view = new View('cp_alcmen');
        $view->title = 'Control Panel';
        $view->heading = 'CP';
        $catrepo = new CatRepository();
        $view->categories = $catrepo->readAllCat();
        $view->subcat = $catrepo->readAllScat();
        $view->display();



    }
    public function doInsertALC(){
        $catrepo = new CatRepository();
        if(isset($_POST['submit'])){
            if($_POST['menu-cat']!=null&$_POST['menu-name']!=null&$_POST['menu-beschreibung']!=null&$_POST['menu-preis']!=null) {
                $cat = htmlspecialchars($_POST['menu-cat']);
                $name = htmlspecialchars($_POST['menu-name']);
                $beschreibung = htmlspecialchars($_POST['menu-beschreibung']);
                $preis = htmlspecialchars($_POST['menu-preis']);
                if ($catrepo->insertALCMenu($cat, $name, $beschreibung, $preis)) {
                    $this->doError("Menü erfolgreich eingetragen");
                    header("Location: /cp/a_la_carte");
                } else {
                    $this->doError("Menü konnte nicht eingetragen werden");
                }
            }
            else{
                $this->doError("Füllen sie bitte alle erfordelichen Felder aus!");
                header("Location: /cp/a_la_carte");
            }
        }
    }
    public function doInsertTages(){
        $catrepo = new CatRepository();
        if(isset($_POST['submit'])){

            if($_POST['tag'] != null&$_POST['menu1-name'] != null&$_POST['menu1-beschreibung'] != null&$_POST['menu1-preis'] != null&$_POST['menu2-name']  != null&$_POST['menu2-beschreibung']  != null&$_POST['menu2-preis']  != null&$_POST['thit-name']  != null&$_POST['thit-beschreibung']  != null&$_POST['thit-preis'] != null) {
                $day= htmlspecialchars($_POST['tag']);
                $m1_name= htmlspecialchars($_POST['menu1-name']);
                $m1_beschreibung= htmlspecialchars($_POST['menu1-beschreibung']);
                $m1_preis= htmlspecialchars($_POST['menu1-preis']);
                $m2_name= htmlspecialchars($_POST['menu2-name']);
                $m2_beschreibung= htmlspecialchars($_POST['menu2-beschreibung']);
                $m2_preis= htmlspecialchars($_POST['menu2-preis']);
                $th_name= htmlspecialchars($_POST['thit-name']);
                $th_beschreibung= htmlspecialchars($_POST['thit-beschreibung']);
                $th_preis= htmlspecialchars($_POST['thit-preis']);
                if($day>=date('Y-m-d')) {
                    if ($catrepo->insertTagMenu($day, $m1_name, $m1_beschreibung, $m1_preis, $m2_name, $m2_beschreibung, $m2_preis, $th_name, $th_beschreibung, $th_preis)) {
                        $this->doError("Menü erfolgreich eingetragen");
                        header("Location: /cp/tagesmenu");
                    } else {
                        $this->doError("Menü konnte nicht eingetragen werden");
                    }
                }
                else{
                    $this->doError("Wählen Sie bitte ein gültiges Datum aus!");
                    header("Location: /cp/tagesmenu");
                }
            }
            else{
                $this->doError("Füllen Sie bitte alle erfordelichen Felder aus!");
                header("Location: /cp/tagesmenu");
            }
        }

    }
    public function liste()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.

        $view = new View('cp_list');
        $view->title = 'Control Panel';
        $view->heading = 'CP';

        $catrepo = new CatRepository();
        $view->categories=$catrepo->readAllCat();
        $view->subcat=$catrepo->readAllScat();
        $view->menus = $catrepo->readAllMen();
        $view->display();

    }
    public function doError($error){
        $this->err = array_fill(0,1,$error);
        session_start();
        $_SESSION['err'] = $this->err;
    }
    public function editALC(){
        $id=$_GET['id'];
        $view = new View('cp_alcmen_edit');
        $view->title = 'Control Panel';
        $view->heading = 'CP';
        $catrepo = new CatRepository();
        $view->categories = $catrepo->readAllCat();
        $view->subcat = $catrepo->readAllScat();
        $view->menu = $catrepo->readMenById($id);

        $view->display();

    }
    public function doEditALC(){
        $alcid = $_GET['id'];
        $catrepo = new CatRepository();
        if(isset($_POST['submit'])){
            if($_POST['menu-cat']!=null&$_POST['menu-name']!=null&$_POST['menu-beschreibung']!=null&$_POST['menu-preis']!=null) {
                $cat = htmlspecialchars($_POST['menu-cat']);
                $name = htmlspecialchars($_POST['menu-name']);
                $beschreibung = htmlspecialchars($_POST['menu-beschreibung']);
                $preis = htmlspecialchars($_POST['menu-preis']);
                if ($catrepo->updateALCMenu($cat, $name, $beschreibung, $preis,$alcid)) {
                    $this->doError("Menü erfolgreich aktualisiert");
                    header("Location: /cp/liste");
                } else {
                    $this->doError("Menü konnte nicht aktualisiert werden");
                }
            }
            else{
                $this->doError("Füllen sie bitte alle erfordelichen Felder aus!");
                header("Location: /cp/editALC?id=$alcid");
            }
        }
    }
    public function deleteALC(){
        $id = $_GET['id'];
        $catrepo = new CatRepository();
        if($catrepo->deleteById($id)){
            $this->doError("Menü wurde erfolgreich gelöscht");
            header("Location: /cp/liste");
        }
        else{
            $this->doError("Menü konnte nicht gelöscht werden");
            header("Location: /cp/liste");
        }
    }

}