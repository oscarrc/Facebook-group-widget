<?php

	header('Content-Type: text/html; charset=utf-8');
	 
	 
	$limit = 10; // The number of posts fetched
	$access_token = 'YourAccessToken';
	$group_id = 'YourGroupID';
	$url1 = 'https://graph.facebook.com/'.$group_id.'?access_token='.$access_token;
	$des = json_decode(file_get_contents($url1)) ;
	 
	 
	/**echo '<pre>';
	print_r($des);
	echo '</pre>';**/
	 
	$url2 = "https://graph.facebook.com/{$group_id}/feed?access_token={$access_token}";
	$data = json_decode(file_get_contents($url2));
?>

<div class="wrapperfb">
	<div class="topfb">
 		<a class="afb" href='http://www.facebook.com/home.php?sk=group_<?=$group_id?>&ap=1'>
			<?=$des->name?>
		</a>

		<div class="description">
 			<?= nl2br( $des->description ) ?>
 		</div>
 	</div>

	<?php
		$counter = 0;
 
		foreach($data->data as $d) {
 			if($counter==$limit){
 				break;
 			}
 	?>

	<div class="singlefb">
 		<div class="imgfb">
 			<a class="afb" href="http://facebook.com/profile.php?id=<?=$d->from->id?>">
    			<img border="0" alt="<?=$d->from->name?>" src="https://graph.facebook.com/<?=$d->from->id?>/picture"/>
			</a>
 		</div>

 		<div class="textfb">
	 		<span class="bold">
	 			<a class="afb" href="http://facebook.com/profile.php?id=<?=$d->from->id?>">
					<?=$d->from->name?>
				</a>
			</span>

			<br/>

	 		<span class="date">
	 			on <?=date('F j, Y H:i',strtotime($d->created_time))?>
	 		</span>

			<br/>
	 
			<?= nl2br( $d->message ) ?>

			<br/>
	 
	 		<?=$d->name?>

	 		<br/>

			 <a href="<?=$d->link?>">
			 	<img class="pic" src="<?=$d->picture?>" title="<?=$d->description?>">
			 </a>
		</div>
	</div>

 	<?php
		$counter++;
		}
	?>
</div>
