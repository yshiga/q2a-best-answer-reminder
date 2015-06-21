<?php

class q2a_ba_reminder_admin {
	function init_queries($tableslc) {
		return null;
	}

	function option_default($option) {
		switch($option) {
			case 'q2a_ba_reminder_answer_count':
				return 2; 
			default:
				return null;
		}
	}
		
	function allow_template($template) {
		return ($template!='admin');
	}       
		
	function admin_form(&$qa_content){                       
		// process the admin form if admin hit Save-Changes-button
		$ok = null;
		if (qa_clicked('q2a-ba-reminder-save')) {
			qa_opt('q2a_ba_reminder_answer_count', (int)qa_post_text('q2a_ba_reminder_answer_count')); // hours
			$ok = qa_lang('admin/options_saved');
		}
		
		// form fields to display frontend for admin
		$fields = array();
		
		$fields[] = array(
			'type' => 'number',
			'label' => 'answer count',
			'tags' => 'name="q2a_ba_reminder_answer_count"',
			'value' => qa_opt('q2a_ba_reminder_answer_count'),
		);
		
		return array(     
			'ok' => ($ok && !isset($error)) ? $ok : null,
			'fields' => $fields,
			'buttons' => array(
				array(
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'name="q2a-ba-reminder-save"',
				),
			),
		);
	}
}

