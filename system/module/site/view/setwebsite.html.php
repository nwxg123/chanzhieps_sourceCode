<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The setdomain view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php js::set('closeScoreTip', $lang->site->closeScoreTip);?>
<?php js::set('requestTypeTip', $lang->site->requestTypeTip);?>
<?php js::set('requestType', $requestType);?>
<section>
  <form method='post' id='websiteForm'>
    <table class='table table-form'>
      <tr class='border border-top'><td class='w-150px text-left'><?php echo $lang->site->setUrlType;?></td><td class='col-xs-8'></td><td></td></tr>
      <tr class='border border-body'>
        <th><?php echo $lang->site->requestType;?></th> 
        <td>
          <?php echo html::radio('requestType', $lang->site->requestTypeList, $this->config->frontRequestType);?>
          <span id='requestTypeTip' class='text-important'><?php echo $lang->site->requestTypeTip?></span>
        </td>
        <td></td>
      </tr>
      <tr class='border border-bottom'><td colspan='3'></td></tr>
      <tr class='space'></tr>
      <tr class='border border-top'><td class='text-left' colspan='3'><?php echo $lang->site->setDomain;?></td></tr>
      <tr class='border border-body'>
        <th class='w-100px top-input'><?php echo $lang->site->domain;?></th> 
        <td class='w-p40'>
          <?php echo html::input('domain',  isset($this->config->site->domain) ? $this->config->site->domain : '', "class='form-control'");?>
          <span class="text-important"><?php echo $lang->site->setDomainTip;?></span>
        </td>
        <td><?php echo html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "data-custom='{$lang->site->domainTip}' data-toggle='modal' data-icon='question-sign' data-title='{$lang->site->domain}'")?></td>
      </tr>
      <tr class='border border-body'>
        <th><?php echo $lang->site->allowedDomain;?></th> 
        <td><?php echo html::input('allowedDomain',  isset($this->config->site->allowedDomain) ? $this->config->site->allowedDomain : '', "class='form-control'");?></td>
        <td><?php echo html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "data-custom='{$lang->site->allowedDomainTip}' data-toggle='modal' data-icon='question-sign' data-title='{$lang->site->allowedDomain}'")?></td>
      </tr>
      <tr class='border border-body' title="<?php echo $lang->site->schemeTip;?>">
        <th><?php echo $lang->site->scheme;?></th> 
        <td><?php echo html::radio('scheme', $lang->site->schemeList, isset($this->config->site->scheme) ? $this->config->site->scheme : 'http', "class='checkbox'");?></td>
        <td></td>
      </tr>
      <tr class='border border-bottom'><td colspan='3'></td></tr>
      <tr class='space'></tr>
      <tr class='border border-top'><td class='text-left' colspan='3'><?php echo $lang->site->setCDN;?></td></tr>
      <tr class='border border-body'>
        <th class='w-100px'><?php echo $lang->site->useCDN;?></th>
        <td>
          <?php echo html::radio('open', $lang->site->cdnList, $this->config->cdn->open, "class='checkbox'");?>
          <span class="text-important"><?php echo $lang->site->setCDNTip;?></span>
        </td>
        <td></td>
      </tr>
      <tr class="border border-body cdn-host <?php echo $this->config->cdn->open == 'open' ? '' : 'hide';?>">
        <th><?php echo $lang->site->cdn;?></th>
        <td class='w-500px'>
          <div class='input-group'>
            <?php echo html::input('site', !empty($this->config->cdn->site) ? $this->config->cdn->site : $config->cdn->host . $this->config->version . '/', "data-default='{$config->cdn->host}{$this->config->version}' class='form-control'");?>
            <span class='input-group-addon cdnreseter'><?php echo $lang->site->useDefaultCdn?></span>
          </div>
        </td>
        <td></td>
      </tr>
      <tr class='border border-bottom'><td colspan='3'></td></tr>
      <tr class='space'></tr>
      <tr>
        <th></th>
        <td colspan='2'>
          <?php echo html::a($this->createLink('guarder', 'validate', "url=&target=modal&account=&type=okFile"), $lang->save, "data-toggle='modal' class='hidden captchaModal'")?>
          <?php echo html::submitButton();?>
          <span class='hidden tip alert alert-info' style='marging: 0.3px'></span>
        </td>
      </tr>
    </table>
  </form>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
