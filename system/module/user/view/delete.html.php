<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-globe'></i> <?php echo $lang->user->userHistory;?></strong></div>
  <form id='ajaxForm' method='post' action="<?php echo inlink('delete', "account={$account}");?>">
    <div class='panel'>
      <?php if(!empty($userHistory->threads)):?>
      <div class="panel-heading"><?php echo $lang->user->threadHistory;?></div>
      <div class="panel-body">
        <?php foreach($userHistory->threads as $thread):?>
        <?php echo html::checkbox('threads', array($thread->id => html::a(commonModel::createFrontLink('thread', 'view', "threadID=$thread->id"), $thread->title, "class='list-group-item' target='_blank'")), $thread->id, '', 'block');?>
        <?php endforeach;?>
      </div>
      <?php endif;?>
      <?php if(!empty($userHistory->replies)):?>
      <div class="panel-heading"><?php echo $lang->user->replyHistory;?></div>
      <div class="panel-body">
        <?php foreach($userHistory->replies as $reply):?>
        <?php echo html::checkbox('replies', array($reply->id => html::a(commonModel::createFrontLink('thread', 'locate', "threadID={$reply->thread}&replyID={$reply->id}"), $reply->content, "class='list-group-item' target=_blank")), $reply->id, '', 'block');?>
        <?php endforeach;?>
      </div>
      <?php endif;?>
      <?php if(!empty($userHistory->comments)):?>
      <div class="panel-heading"><?php echo $lang->user->commentHistory;?></div>
      <div class="panel-body">
        <?php foreach($userHistory->comments as $comment):?>
        <?php echo html::checkbox('comments', array($comment->id => $comment->content), $comment->id, '', 'block');?>
        <?php endforeach;?>
      </div>
      <?php endif;?>
      <?php if(!empty($userHistory->messages)):?>
      <div class="panel-heading"><?php echo $lang->user->messageHistory;?></div>
      <div class="panel-body">
        <?php foreach($userHistory->messages as $message):?>
        <?php echo html::checkbox('messages', array($message->id => $message->content), $message->id, '', 'block');?>
        <?php endforeach;?>
      </div>
      <?php endif;?>
      <?php if(!empty($userHistory->orders)):?>
      <div class="panel-heading"><?php echo $lang->user->orderHistory;?></div>
      <div class="panel-body">
        <?php foreach($userHistory->orders as $orderID => $orderProducts):?>
        <?php 
          $orderTitle = ''; 
          foreach($orderProducts as $product) $orderTitle .= $product->productName . ' ';
        ?> 
        <?php echo html::checkbox('orders',array($orderID => $orderTitle), $orderID, '', 'block');?>
        <?php endforeach;?>
      </div>
      <?php endif;?>
      <?php if(!empty($userHistory->addresses)):?>
      <div class="panel-heading"><?php echo $lang->user->addressHistory;?></div>
      <div class="panel-body">
        <?php foreach($userHistory->addresses as $address):?>
        <?php echo html::checkbox('addresses', array($address->id => $address->address), $address->id, '', 'block');?>
        <?php endforeach;?>
      </div>
      <?php endif;?>
      <?php if(!empty($userHistory->submissions)):?>
      <div class="panel-heading"><?php echo $lang->user->submissionHistory;?></div>
      <div class="panel-body">
        <?php foreach($userHistory->submissions as $submission):?>
        <?php echo html::checkbox('submissions', array($submission->id => html::a($this->loadModel('article')->createPreviewLink($submission->id), $submission->title, "target='_blank'")), $submission->id, '', 'block');?>
        <?php endforeach;?>
      </div>
    <?php endif;?>
      <div class='panel-body'>
        <?php echo $lang->guarder->password;?>
        <?php echo html::password('password', '', "placeholder='{$lang->guarder->passwordHolder}'");?>
        <?php echo html::a('javascript:;', $lang->delete, "class='btn btn-primary submit'");?>
      </div>
    </div>
  </form>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
