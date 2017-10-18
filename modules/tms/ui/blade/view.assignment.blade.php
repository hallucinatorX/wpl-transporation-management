<?php
include_once './util/class.util.php';

include_once '/../../bao/class.assignbao.php';
include_once '/../../bao/class.assetbao.php';

$_AssignBao = new AssignBao();

$_DB = DBUtil::getInstance();
$_Log= LogUtil::getInstance();


$globalUser = '';
if(isset($_POST['save']))
{
	$Combination = new Combination();

	$Combination->setAssetId($_DB->secureInput($_POST['selectAsset']));
	$Combination->setDriverId($_DB->secureInput($_POST['txtDriver']));
	$Combination->setHelperId($_DB->secureInput($_POST['txtHelper']));
	$Combination->setRouteId($_DB->secureInput($_POST['txtRoute']));

	$Result = $_AssignBao->newAssignRequest($Combination);

	if($Result->getIsSuccess())
		echo '<strong>'.$Result->getResultObject().'</strong>';

	header("Location:".PageUtil::$COMBO);

}


?>
