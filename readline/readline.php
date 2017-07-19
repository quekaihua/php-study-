<?php

	for($i = 0; $i < 3; $i++){
		$line = readline("Commands : ");
		readline_add_history($line);
	}

	print_r(readline_list_history());

	print_r(readline_info());