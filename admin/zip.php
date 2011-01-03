<?php
		$path = "c:/minecraft/bin/Pingas.zip";
        $zip = zip_open($path);
/*
            // find entry
            do {
                $entry = zip_read($zip);
            } while ($entry && zip_entry_name($entry) != "install.rdf");

            // open entry
            zip_entry_open($zip, $entry, "r");

                // read entry
                $entry_content = zip_entry_read($entry, zip_entry_filesize($entry));

                // position of <em:version>
                $version_open_pos = strpos($entry_content, "<em:version>");

                // position of </em:version>
                $version_close_pos = strpos($entry_content, "</em:version>", $version_open_pos);

                // version
                $version = substr(
                        $entry_content,
                        $version_open_pos + strlen("<em:version>"),
                        $version_close_pos - ($version_open_pos + strlen("<em:version>"))
                );

            // close entry
            zip_entry_close($entry);
*/
        // close zip
        zip_close($zip);

?>