<?php
/**
 * @addtogroup Extensions
 */

$messages = array();
$messages ['en'] = array(
			'multidelete' => 'Delete batch of pages',
                        'multidelete_button' => 'DELETE' ,
                        'multidelete_help' => 'Delete a batch of pages. You can either perform a single delete, or delete pages listed in a file. You can do it for this wiki, all wikis from shared database or selected wikis (from a text file, each in a single new line).  Choose a user that will be shown in deletion logs. Uploaded page list file should contain page name and optional reason separated by | character in each line.' ,
                        'multidelete_caption' => 'Page list' ,
                        'multidelete_title' => 'Multi Delete' ,
                        'multidelete_as' => 'Run the script as' ,
                        'multidelete_both_modes' => 'Please choose either one specified page or a given list of pages.' ,
                        'multidelete_or' => '<b>OR</b>' ,
                        'multidelete_task_added' => 'Multi delete task #$1 was added.' ,
                        'multidelete_task_error' => 'There was an error in adding the multi delete task.' ,
                        'multidelete_task_none_selected' => 'You didn\'t select any articles. The task was not added.' ,
                        'multidelete_task_link' => 'You can check your task ' ,
                        'multidelete_on' => 'on' ,
                        'multidelete_page' => "Pages to be deleted" ,
                        'multidelete_reason' => 'Reason for deletion' ,
                        'multidelete_list_caption' => 'in a specified wiki list' ,
                        'multidelete_choose_articles' => 'choose which found articles should be deleted' ,
                        'multidelete_processing' => 'deleting pages ' ,
                        'multidelete_from_file' => 'from file list' ,
                        'multidelete_from_form' => 'from form' ,
                        'multidelete_this_wiki' => 'this wiki' ,
                        'multidelete_inbox_caption' => 'or separated by commas' ,
                        'multidelete_all_wikis' => 'all wikis' ,
                        'multidelete_selected_wikis' => 'selected wikis' ,
                        'multidelete_success_subtitle' => 'for $1' ,
                        'multidelete_link_back' => 'You can go back to the MultiDelete form ' ,
                        'multidelete_omitting_nonexistant' => 'Omitting non-existing page $1.' ,
                        'multidelete_omitting_invalid' => 'Omitting invalid page $1.' ,
                        'multidelete_file_bad_format' => 'The file should be plain text' ,
                        'multidelete_file_missing' => 'Unable to read given file' ,
                        'multidelete_select_script' => 'delete page script' ,
                        'multidelete_select_yourself' => 'you' ,
                        'multidelete_no_page' => 'Please specify at least one page to delete OR choose a file containing page list.' ,
			'multidelete_split_results' => "Your article count was too high to be done in a single task. It has been split into '''$1''' tasks instead, with a maximum chunk size of '''$2''' articles." ,
			'multidelete_max_display_size' => "Multidelete has currently a maximum number of articles in the confirm phase. Your query has been capped at '''$1''' articles. Choose your articles and save task. After that, consider running it again to catch all the remaining articles."			
        	);
