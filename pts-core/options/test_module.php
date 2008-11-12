<?php

/*
	Phoronix Test Suite
	URLs: http://www.phoronix.com, http://www.phoronix-test-suite.com/
	Copyright (C) 2008, Phoronix Media
	Copyright (C) 2008, Michael Larabel

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

class test_module
{
	public static function run($r)
	{
		$module = strtolower($r[0]);
		if(is_file(MODULE_DIR . $module . ".php") || is_file(MODULE_DIR . $module . ".sh"))
		{
			pts_load_module($module);
			pts_attach_module($module);

			echo pts_string_header("Starting Module Test Process");

			$module_processes = pts_module_processes();

			foreach($module_processes as $process)
			{
				if(IS_DEBUG_MODE)
				{
					echo "Calling: " . $process . "()\n";
				}

				pts_module_process($process);
				sleep(1);
			}
			echo "\n";
		}
		else
		{
			echo "\n" . $module . " is not recognized.\n";
		}
	}
}

?>
