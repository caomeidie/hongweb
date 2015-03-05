<?php
/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

function include_db_config()
{
    return include dirname(__FILE__) . DS . '/../config' . DS . 'db.php';
}

/**
 * This is the shortcut to Yii::app()
 */
function app()
{
    return Yii::app();
}

/**
 * This is the shortcut to Yii::app()->clientScript
 */
function cs()
{
    // You could also call the client script instance via Yii::app()->clientScript
    // But this is faster
    return Yii::app()->getClientScript();
}

/**
 * This is the shortcut to Yii::app()->user.
 */
function user()
{
    return Yii::app()->getUser();
}

/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}

function homeUrl() {
    return Yii::app()->createAbsoluteUrl('/');
}

/**
 * This is the shortcut to CHtml::encode
 */
function h($text)
{
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}

/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array())
{
    return CHtml::link($text, $url, $htmlOptions);
}

/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message, $params = array(), $source = null, $language = null)
{
    return Yii::t('app', $message, $params, $source, $language);
}


/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name, $default = null)
{
    if ( isset(Yii::app()->params[$name]) )
        return Yii::app()->params[$name];
    else
        return $default;
}

/**
 * Dump as many variables as you want. Infinite parameters.
 */
function dump()
{
    $args = func_get_args();
    foreach($args as $k => $arg){
        echo '<fieldset class="debug">
        <legend>'.($k+1).'</legend>';
        CVarDumper::dump($arg, 10, true);
        echo '</fieldset>';
    }
}

/**
 * @return string the generated image tag
*/
function i($src, $alt = '', $htmlOptions = array())
{
    return CHtml::image($src, $alt, $htmlOptions);
}

/**
 * Dump and die - extending dump() from post #7860
*/
function dd()
{
    $args = func_get_args();
    foreach ($args as $k => $arg) {
        echo '<fieldset class="debug">
        <legend>'.($k+1).'</legend>';
        CVarDumper::dump($arg, 10, true);
        echo '</fieldset>';
    }
    die;
}

function fb($what)
{
    echo Yii::trace(CVarDumper::dumpAsString($what), 'vardump');
}

function isHomePage()
{
        $app = Yii::app();
         return $app->controller->route == $app->defaultController;
}

function gen_pk()
{
    return time().substr(microtime(), 2, 6);
}

function genPk()
{
    return time().substr(microtime(), 2, 6);
}

/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url = null)
{
    static $baseUrl;
    if ($baseUrl===null) {
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    }
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url, '/');
}

/**
 * theme base url
 *
 * @param mixed $url
 * @access public
 * @return void
 */
function tbu($url)
{
    static $theme_baseUrl;
    if (is_null(Yii::app()->getTheme())) {
        return bu($url);
    } else {
        $url = ltrim($url, '/');
        $theme_baseUrl=Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->getBasePath() . '/assets');
        return $url===null ? $theme_baseUrl : $theme_baseUrl.'/'. $url;
    }
}

function isLoggedIn()
{
    if (!isset(Yii::app()->user)) {
         return false;
    }
    return !Yii::app()->user->getIsGuest();
}

function getUserId()
{
    if (!isset(Yii::app()->user)) {
         return false;
    }
    return Yii::app()->user->getId();
}

function loginUrl()
{
    if (isLoggedIn()) {
        return CHtml::link('退出', Yii::app()->createUrl('site/logout'));
    } else {
        return CHtml::link('登录', Yii::app()->createUrl('site/login'));
    }
}

function siteUrl($route, $params = array())
{
    return Yii::app()->createAbsoluteUrl($route, $params);
}

function loginName()
{
    if (!isset(Yii::app()->user)) {
         return '';
    }
    return Yii::app()->user->getName();
}

function getTitle($title)
{
    static $titleFormat;
    if (empty($titleFormat)) {
        $titleFormat = param('titleFormat');
    }
    return sprintf($titleFormat, $title);
}

function request()
{
    return Yii::app()->getRequest();
}

function session()
{
    return Yii::app()->getSession();
}

/**
 * 如果当前action 不等于currentAction 就显示对应的class
 * 反之，当前action 等于currentAction, 则不显示对应的class
 *
 * @param string $currentAction 传入action
 * @param string $hiddenClass 需要显示的class属性
 * @access public
 * @return void
 */
function hideClass($currentAction = '', $hiddenClass = 'none')
{
    if (Yii::app()->controller->action->id == $currentAction) {
        return '';
    }
    return $hiddenClass;
}

/**
 * 当前实际action 等于$currentAction 则显示对应的class
 *
 * @param mixed $currentAction
 * @param mixed $showClass
 * @access public
 * @return void
 */
function showClass($currentAction = null, $showClass, $currentController = null)
{
    if($currentController) {
        if(!$currentAction) {
            if (Yii::app()->controller->id == $currentController) {
                return $showClass;
            }
        } else {
            if (Yii::app()->controller->id == $currentController && Yii::app()->controller->action->id == $currentAction) {
                return $showClass;
            }
        }
    } else {
        if (Yii::app()->controller->action->id == $currentAction) {
            return $showClass;
        }
    }
    return '';
}

/**
 * 若valueNeeded == valueCurrent,返回cssClassYes,否则返回cssClassNo
 *
 * @param mixed $valueNeeded
 * @param mixed $valueCurrent
 * @param mixed $cssClassYes
 * @param mixed $cssClassNo
 * @access public
 * @return void
 */
function valueShow($valueNeeded, $valueCurrent, $cssClassYes, $cssClassNo)
{
    if ($valueNeeded == $valueCurrent) {
        return $cssClassYes;
    }
    return $cssClassNo;
}

function moneyRound($money, $precision = 2, $thousands_sep = ',')
{
    $rounded = round($money, $precision);
    return number_format($rounded, $precision, '.', $thousands_sep);
}

function showImage($currentAction = null, $imageName, $currentController = null, $imageSubfix = '.png')
{
    if($currentController) {
        if(!$currentAction) {
            if (Yii::app()->controller->id == $currentController) {
                return tbu("images/".$imageName."_s".$imageSubfix);
            }
        } else {
            if (Yii::app()->controller->id == $currentController && Yii::app()->controller->action->id == $currentAction) {
                return tbu("images/".$imageName."_s".$imageSubfix);
            }
        }
    } else {
        if (Yii::app()->controller->action->id == $currentAction) {
            return tbu("images/".$imageName."_s".$imageSubfix);
        }
    }
    return tbu("images/".$imageName.$imageSubfix);;
}

/**
 * 过滤整形数字或字符串
 *
 * @param mixed $var
 * @access public
 * @return int
 */
function filter_int($var)
{
    return filter_var($var,FILTER_SANITIZE_NUMBER_INT);
}

function default_value($var,$default='')
{
    if(isset($var) && !empty($var)) {
        return $var;
    } else {
        return $default;
    }
}

/**
 * 相等则输出
 * @param mixed $left
 * @param mixed $right
 * @param mixed $string
 * @access public
 * @return void
 */
function eq($left,$right,$string) {
    return $left == $right ? $string : '';
}

function radio_checked($field_value,$current_value)
{
    if($field_value == $current_value) {
        return ' checked="checked"';
    }
    return '';
}

function selected($field_value,$current_value)
{
    if(0 === strcmp($field_value, $current_value)) {
        return ' selected="selected"';
    }
    return '';
}

/**
 * 方便在PHP模板中输出input readonly 属性
 * @param mixed $field_value
 * @param mixed $current_value
 * @access public
 * @return string
 */
function readonly($field_value, $current_value) {
    return $field_value == $current_value ? ' readonly="readonly" ' : '';
}

/**
 * 格式化金额输出
 *
 * @param mixed $number
 * @param int $dec
 * @param string $dec_point
 * @param string $thousands_sep
 * @access public
 * @return string
 */
function zjs_number_format($number, $dec=2, $dec_point='.', $thousands_sep='') {
  return number_format($number, $dec, $dec_point, $thousands_sep);
}
