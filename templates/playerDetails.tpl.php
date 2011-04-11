<div class="playerDetailsWrapper">
<?php global $reachTools ?>
<?php if ( $this->data->Player ): ?>
	<div class="playerModel span-5">
		<img class="playerEmblem" src="<?php echo $reachTools->cacheImage( tools::handle( $this->data->Player->gamertag ) . 'PlayerEmblem50', reachApiTools::getEmblemUri( $this->data->Player->ReachEmblem, 50 ), 'png') ?>" alt="<?php echo $this->data->Player->gamertag ?>'s emblem" />
		<img class="playerModelImage" src="<?php echo $reachTools->cacheImage( tools::handle( $this->data->Player->gamertag ) . 'PlayerImageHiRes', reachApiTools::bungieUrl . $this->data->PlayerModelUrlHiRes, 'png') ?>" alt="<?php echo $this->data->Player->gamertag ?>" />
	</div>
	<div class="span-16 last">
		<h2 title="First active <?php echo date('Y-m-d H:i', reachApiTools::convertReachDate( $this->data->Player->first_active ) ) ?>, last seen <?php echo date('Y-m-d H:i', reachApiTools::convertReachDate( $this->data->Player->last_active ) ) ?>">
			<?php echo $this->data->Player->gamertag ?>
		</h2>
		<p>
			<?php echo $this->data->Player->service_tag ?>
		</p>
		<dl>
			<dt>Campaign progress</dt>
			<dd><?php echo $this->data->Player->CampaignProgressSp ?></dd>
			<dt>Co-operative campaign progress</dt>
			<dd><?php echo $this->data->Player->CampaignProgressCoop ?></dd>
		</dl>
		<dl>
			<dt>Commendation completion</dt>
			<dd title="<?php echo round( $this->data->Player->commendation_completion_percentage * 100, 2 )?>%"><?php echo floor( $this->data->Player->commendation_completion_percentage * 100 )?>%</dd>
			<dt>Armor completion</dt>
			<dd title="<?php echo round( $this->data->Player->armor_completion_percentage * 100, 2 )?>%"><?php echo floor( $this->data->Player->armor_completion_percentage * 100 )?>%</dd>
			<dt>Daily challenges</dt>
			<dd><?php echo $this->data->Player->daily_challenges_completed ?> <em>&ndash; <?php echo round( $this->data->Player->daily_challenges_per_day, 1 ) ?> per day</em></dd>
			<dt>Weekly challenges</dt>
			<dd><?php echo $this->data->Player->weekly_challenges_completed ?><!-- <em>&ndash; <?php echo round( $this->data->Player->weekly_challenges_per_week, 2 ) ?> per week	</em>--></dd>
			<dt>Games played</dt>
			<dd><?php echo $this->data->Player->games_total ?> <em>&ndash; <?php echo round( $this->data->Player->games_per_day, 1 ) ?> per day</em></dd>
		</dl>
	</div>
<?php else: ?>
 <h2>Error: Player not found</h2>
<?php endif; ?>
	<div class="clear"></div>
</div>