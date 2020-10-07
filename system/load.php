<?php
    function loadPage($page='site')
    {
        $view='views/';
        if($page=='site')
            {
                if(isset($_REQUEST['option']))
                {
                    $view.=$_REQUEST['option'];
                    if(isset($_REQUEST['id']))
                    {
                        $view.='-detail.php';
                    }
                    else
                    {
                        if (isset($_REQUEST['cat']))
                        {
                            $view.='-category.php';
                        }
                        else
                    {
                        $view.='.php';
                    }
                }
            }
            else
            {
                $view.='home.php';
            }
        }
        else{
        if (isset($_REQUEST['option']))
        {
            $view .= $_REQUEST['option'] . '/';
            if (isset($_REQUEST['cat']))
            {
                $view .= $_REQUEST['cat'] . '.php';
            }
            else{
                $view .='index.php';
            }
        }
        else
        {
            $view .='dashboard/index.php';
        }
    }
        require_once ($view);
    }
//loadModel
#Hàm này sẽ gọi Database
function loadModel($name)
{
    $name = ucfirst(strtolower($name));
    $pathModel = "models/" . $name .'.php';
    if (!file_exists($pathModel))
    {
        $pathModel = "../models/" . $name .'.php';
    }
    require_once($pathModel);
    return new $name;
}
//PHÂN TRANG
function loadClass($name)
{
    $name = ucfirst(strtolower($name));
    $pathClass = "system/" . $name .'.php';
    if (!file_exists($pathClass))
    {
        $pathClass = "../system/" . $name .'.php';
    }
    require_once($pathClass);
    return new $name;
}