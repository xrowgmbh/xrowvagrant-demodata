<?php /* #?ini charset="utf-8"?

[CronjobPart-frequent]
Scripts[]
Scripts[]=notification.php
Scripts[]=workflow.php
Scripts[]=ezflowupdate.php
Scripts[]=indexcontent.php
Scripts[]=ezfindexsubtree.php
#Don't want those
#Scripts[]=hide.php

[CronjobPart-hourly]
Scripts[]
#Don't want those
#Scripts[]=unpublish.php
#Scripts[]=runmonitor.php

[CronjobPart-daily]
Scripts[]
Scripts[]=ezfoptimizeindex.php
Scripts[]=ezflowcleanup.php
#Don't want those
#Scripts[]=runpatch.php
#Scripts[]=syncnetwork.php

[CronjobPart-weekly]
Scripts[]
Scripts[]=basket_cleanup.php
Scripts[]=linkcheck.php
Scripts[]=unlock.php
Scripts[]=subtreeexpirycleanup.php
Scripts[]=internal_drafts_cleanup.php
#Don't want those
#Scripts[]=session_gc.php

[CronjobPart-monthly]
Scripts[]
Scripts[]=old_drafts_cleanup.php

*/ ?>