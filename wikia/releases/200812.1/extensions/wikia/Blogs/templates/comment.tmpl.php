<?php
if( isset( $single ) && $single ):
/**
 * this is exactly the same comment schema as below between <li>/<li>
 * it's used for ajaxed inserting new child. So if you want to change anything
 * you have to change in both cases
 */
?>
<div class="blog-comment">
	<a name="<?php echo isset( $comment["anchor"][2] ) ? $comment["anchor"][2] : "" ?>"></a>
	<div class="comment_avatar">
		<?php echo $comment["avatar"] ?>
	</div>
	<div class="comment">
		<div class="details">
			<strong><?php echo $comment["sig"] ?></strong>
			<span class="timestamp"><?php echo $comment["timestamp"] ?></span>
		</div>
		<?php
			echo $comment["text"];
		?>
	</div>
</div>
<br style="clear: both;" />
<?php
else:
?>
<a name="comments"></a>
<h2 class="wikia_header">
<?php echo wfMsg("blog-comments") ?>
</h2>
<?php
if( isset( $props[ "commenting" ] ) && $props[ "commenting" ] == 1  && count( $comments ) > 1 ):
?>
<form action="<?php echo $title->getFullURL() ?>" method="get" id="blog-comm-form-select">
<select name="order" style="margin-top:-26px;">
	<option value="asc" <?php if ($order=="asc") echo 'selected="selected"' ?>><?php echo wfMsg("blog-comments-asc") ?></option>
	<option value="desc" <?php if ($order=="desc") echo 'selected="selected"' ?>><?php echo wfMsg("blog-comments-dsc") ?></option>
</select>
</form>
<?php
endif;
?>
<div id="blog-comments" class="reset clearfix">
<?php
if( count( $comments ) > 10 && isset( $props[ "commenting" ] ) && $props[ "commenting" ] == 1 ):
	if( $canEdit ):
		// show top input
?>
<div class="blog-comm-input reset clearfix">
	<form action="<?php $title->getFullURL() ?>" method="post" id="blog-comm-form-top">
		<!-- avatar -->
		<div class="blog-comm-input-avatar">
		<?php
			echo $avatar->getImageTag( 50, 50 );
		?>
		</div>
		<!-- textarea -->
		<div class="blog-comm-input-text">
		<textarea name="wpBlogComment" id="blog-comm-top"></textarea><br />
		<!-- submit -->
		<a href="<?php $title->getFullURL() ?>" name="wpBlogSubmit" id="blog-comm-submit-top" class="bigButton">
			<big><? echo wfMsg("blog-comment-post") ?></big>
			<small></small>
		</a>
		<div class="right" style="font-style: italic;"><?php echo wfMsg("blog-comments-info") ?></div>
		</div>
	</form>
</div>
<?php
	else:
		echo wfMsg("blog-comments-login", SpecialPage::getTitleFor("UserLogin")->getLocalUrl() );
	endif;
endif;

	if( ! $comments ):
		echo "<ul id=\"blog-comments-ul\"><li>";
		echo "<div id=\"blog-comments-zero\">" . wfMsg( "blog-zero-comments" ) . "</div>";
		echo "</li></ul>";
	else:
		echo "<ul id=\"blog-comments-ul\" >";
		foreach( $comments as $comment ):
?>
	<li id="comm-<?php echo $comment[ "title" ]->getArticleId() ?>">
		<div class="blog-comment">
		<a name="<?php echo isset( $comment["anchor"][2] ) ? $comment["anchor"][2] : "" ?>"></a>
		<div class="comment_avatar">
			<?php echo $comment["avatar"] ?>
		</div>
		<div class="comment">
			<div class="details">
				<strong><?php echo $comment["sig"] ?></strong>
				<span class="timestamp"><?php echo $comment["timestamp"] ?></span>
<?php if( $canDelete ): ?>
				<a href="<?php echo $comment[ "title" ]->getLocalUrl( "redirect=no&action=delete" ) ?>">delete</a>
<?php endif;
	if( !empty( $GLOBALS["wgDevelEnvironment"]) ):
		echo '<a href="#" class="blog-comm-hide" id="'.$comment[ "title" ]->getArticleId().'">hide this</a>';
	endif;
?>

			</div>
			<?php
				echo $comment["text"];
			?>
		</div>
		</div>
		<br style="clear: both;" />
	</li>
<?php
		endforeach;
		echo "</ul>";
	endif; // comments

	if( isset( $props[ "commenting" ] ) && $props[ "commenting" ] == 1 ):
		if( $canEdit ):
?>
<div class="blog-comm-input reset clearfix">
	<form action="<?php $title->getFullURL() ?>" method="post" id="blog-comm-form-bottom">
		<!-- avatar -->
		<div class="blog-comm-input-avatar">
		<?php
			echo $avatar->getImageTag( 50, 50 );
		?>
		</div>
		<!-- textarea -->
		<div class="blog-comm-input-text">
		<textarea name="wpBlogComment" id="blog-comm-bottom"></textarea><br />
		<!-- submit -->
		<a href="<?php $title->getFullURL() ?>" name="wpBlogSubmit" id="blog-comm-submit-bottom" class="bigButton">
			<big><? echo wfMsg("blog-comment-post") ?></big>
			<small>Inne info</small>
		</a>
		<div class="right" style="font-style: italic;"><?php echo wfMsg("blog-comments-info") ?></div>
		</div>
	</form>
</div>
<?php
		else:
			echo wfMsg("blog-comments-login", SpecialPage::getTitleFor("UserLogin")->getLocalUrl() );
		endif;
	endif;
	echo "</div>";
endif; # $justLi
?>
