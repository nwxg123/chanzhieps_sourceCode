<?php if(!defined("RUN_MODE")) die();?>
<?php 
/**
 * The edit price view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<form method='post' action='<?php echo inlink('editprice', "orderID={$order->id}");?>' id='ajaxForm'>
  <table class='table table-form'>
    <tr>
      <th class='w-50px'><?php echo $lang->order->price;?></th>
      <td class='col-xs-8'>
        <div class='input-group'>
          <?php echo html::input('amount', $order->amount, "class='form-control'");?>
        </div>
      </td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <span class='input-group-btn'>
          <?php echo html::submitButton();?>
        </span>
      </td>
      <td></td>
    </tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
