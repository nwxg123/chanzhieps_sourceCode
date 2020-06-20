<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The manage privilege by group view of group module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     group
 * @version     $Id: managepriv.html.php 1517 2011-03-07 10:02:57Z wwccss $
 * @link        http://www.zentao.net
 */
?>
<section class='main-table'>
  <header class='clearfix'>
    <ul id='typeNav' class='nav nav-tabs-main pull-left'>
      <li class='active' data-group='all'><?php echo html::a('javascript:;', $lang->group->allGroups);?></li>
      <?php foreach($lang->moduelGroups as $group => $modules):?>
        <?php if(!isset($lang->groups->{$group})) continue;?>
        <?php if($group != 'admin'):?>
          <li data-group='<?php echo $group;?>'><?php echo html::a('javascript:;', $lang->groups->{$group}['title']);?></li>
        <?php endif;?>
      <?php endforeach;?>
    </ul>
  </header>
  <form class='form-condensed' method='post' id='ajaxForm'>
    <table class='table table-hover tablesorter table-fixed'>
      <thead>
        <tr class='text-center'>
          <th class='c-title w-100px'><?php echo $lang->group->group;?></th>
          <th class='c-title w-100px'><?php echo $lang->group->module;?></th>
          <th class='c-title'><?php echo $lang->group->priv;?></th>
        </tr>
      </thead>
    </table>
    <?php foreach($lang->moduelGroups as $group => $modules):?>
    <div class='panel-group' <?php echo "id='group$group'"?>>
      <table class='table table-bordered table-form'> 
        <?php $heading = false;?>
        <?php foreach($modules as $module):?>
        <?php $this->app->loadLang($module);?>
        <?php $moduleActions = zget($lang->resource, $module);?>
        <tr>
          <?php if(!$heading) :?>
          <th class='w-90px' style='text-align:center;' rowspan="<?php echo count($modules);?>"> <?php if(isset($lang->groups->{$group})) echo $lang->groups->{$group}['title'];?></th>
          <?php $heading = true;?>
          <?php endif;?>
          <th class='text-right w-120px'>
            <label class='checkbox-inline pad-right'>
              <?php echo $this->lang->{$module}->common;?>
              <input type="checkbox" class='checkModule' />
            </label>
          </th>
          <td id='<?php echo $module;?>' class='pv-10px'>
            <?php $i = 1;?>
            <?php foreach($moduleActions as $action => $actionLabel):?>
            <?php
            $currentModule = $module;
            if(is_array($actionLabel))
            {
                $module = $actionLabel['module'];
                $actionLabel = $actionLabel['method'];
            }
            ?>
            <div class='group-item'>
              <label class='checkbox-inline'>
                <input type='checkbox' name='actions[<?php echo $module;?>][]' value='<?php echo $action;?>' <?php if(isset($groupPrivs[$module][$action])) echo "checked";?> />
                <span class='priv' id="<?php echo $module . '-' . $actionLabel;?>">
                <?php echo isset($lang->$module->$actionLabel) ? $lang->$module->$actionLabel : $lang->$actionLabel;?>
                </span>
              </label>
            </div>
            <?php $currentModule = $module;?>
            <?php endforeach;?>
          </td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endforeach;?>
    <div class='panel-footer text-center'><?php echo html::submitButton();?></div>
  </form>
</setcion>
<script type='text/javascript'>
var groupID = <?php echo $groupID?>;
</script>
