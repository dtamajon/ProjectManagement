<?php
/*
 * Requires:
 *           $t_per_project
 */
$t_collapse_time_per_project_work_type = 'plugin_pm_time_per_project_work_type';
collapse_open( $t_collapse_time_per_project_work_type );
?>
<table class="width100" cellspacing="1">
	<tr>
		<td colspan="100%" class="form-title">
			<?php collapse_icon( $t_collapse_time_per_project_work_type ); ?>
			<?php echo plugin_lang_get( 'report_by_project_work_types' ); ?>
		</td>
	</tr>
	

	<?php
	foreach ( $t_per_project as $t_project_id => $t_project_data ) {
		echo '<tr>';
		echo '<td colspan="100%" class="form-title" style="padding-top:10px;">';
		echo project_get_name ( $t_project_id );
		echo '</td>';
		echo '</tr>';


		echo '<tr class="row-category">';
		echo '<td>';
		echo '<div align="center">' . plugin_lang_get( 'work_type' ) . '</div>';
		echo '</td>';
		echo '<td>';
		echo '<div align="center">' . plugin_lang_get( 'hours' ) . '</div>';
		echo '</td>';
		if ( access_has_global_level( plugin_config_get( 'view_customer_payment_summary_threshold' ) ) ) {
			echo '<td>';
			echo '<div align="center">' . plugin_lang_get( 'cost' ) .  '</div>';
			echo '</td>';
		}
		echo '</tr>';
		
		foreach ( $t_project_data["work_types"] as $t_work_type => $t_data ) {
			echo '<tr ' . helper_alternate_class() . '>';
			echo '<td class="category">';
			echo print_plugin_enum_string_selected_value( 'work_types', $t_work_type );
			echo '</td>';
			echo '<td class="right">';
			echo minutes_to_time( $t_data["time"] );
			echo '</td>';
			if ( access_has_global_level( plugin_config_get( 'view_customer_payment_summary_threshold' ) ) ) {
				echo '<td class="right">';
				echo format( $t_data["cost"] ) . plugin_config_get ( 'currency_symbol' );
				echo '</td>';
			}
			echo '</tr>';
		}
		echo '<tr ' . helper_alternate_class() . '>';
		echo '<td class="category">' . plugin_lang_get( 'total' ) . '</td>';
		echo '<td class="right bold">';
		echo minutes_to_time( $t_project_data["total_time"] );
		echo '</td>';
		if ( access_has_global_level( plugin_config_get( 'view_customer_payment_summary_threshold' ) ) ) {
			echo '<td class="right bold">';
			echo format( $t_project_data["total_cost"] ) . plugin_config_get ( 'currency_symbol' );
			echo '</td>';
		}
		echo '</tr>';
	}
	?>
</table>
<?php collapse_closed( $t_collapse_time_per_project_work_type ); ?>
<table class="width100" cellspacing="1">
	<tr>
		<td colspan="100%" class="form-title">
			<?php collapse_icon( $t_collapse_time_per_project_work_type ); ?>
			<?php echo plugin_lang_get( 'time_division' ); ?> -
			<?php echo plugin_lang_get( 'per' ); ?> <?php echo plugin_lang_get( 'work_type' ); ?>
		</td>
	</tr>
</table>
<?php collapse_end( $t_collapse_time_per_project_work_type ); ?>
