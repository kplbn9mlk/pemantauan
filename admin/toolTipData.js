var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// jpd_de table
jpd_de_addTip=["",spacer+"This option allows all members of the group to add records to the 'JPD DE' table. A member who adds a record to the table becomes the 'owner' of that record."];

jpd_de_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'JPD DE' table."];
jpd_de_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'JPD DE' table."];
jpd_de_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'JPD DE' table."];
jpd_de_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'JPD DE' table."];

jpd_de_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'JPD DE' table."];
jpd_de_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'JPD DE' table."];
jpd_de_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'JPD DE' table."];
jpd_de_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'JPD DE' table, regardless of their owner."];

jpd_de_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'JPD DE' table."];
jpd_de_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'JPD DE' table."];
jpd_de_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'JPD DE' table."];
jpd_de_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'JPD DE' table."];

// pams_DE table
pams_DE_addTip=["",spacer+"This option allows all members of the group to add records to the 'PAMS DE' table. A member who adds a record to the table becomes the 'owner' of that record."];

pams_DE_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'PAMS DE' table."];
pams_DE_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'PAMS DE' table."];
pams_DE_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'PAMS DE' table."];
pams_DE_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'PAMS DE' table."];

pams_DE_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'PAMS DE' table."];
pams_DE_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'PAMS DE' table."];
pams_DE_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'PAMS DE' table."];
pams_DE_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'PAMS DE' table, regardless of their owner."];

pams_DE_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'PAMS DE' table."];
pams_DE_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'PAMS DE' table."];
pams_DE_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'PAMS DE' table."];
pams_DE_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'PAMS DE' table."];

// JL table
JL_addTip=["",spacer+"This option allows all members of the group to add records to the 'JPL DE' table. A member who adds a record to the table becomes the 'owner' of that record."];

JL_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'JPL DE' table."];
JL_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'JPL DE' table."];
JL_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'JPL DE' table."];
JL_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'JPL DE' table."];

JL_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'JPL DE' table."];
JL_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'JPL DE' table."];
JL_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'JPL DE' table."];
JL_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'JPL DE' table, regardless of their owner."];

JL_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'JPL DE' table."];
JL_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'JPL DE' table."];
JL_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'JPL DE' table."];
JL_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'JPL DE' table."];

// jpd_khas table
jpd_khas_addTip=["",spacer+"This option allows all members of the group to add records to the 'JPD KHAS' table. A member who adds a record to the table becomes the 'owner' of that record."];

jpd_khas_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'JPD KHAS' table."];
jpd_khas_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'JPD KHAS' table."];
jpd_khas_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'JPD KHAS' table."];
jpd_khas_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'JPD KHAS' table."];

jpd_khas_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'JPD KHAS' table."];
jpd_khas_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'JPD KHAS' table."];
jpd_khas_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'JPD KHAS' table."];
jpd_khas_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'JPD KHAS' table, regardless of their owner."];

jpd_khas_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'JPD KHAS' table."];
jpd_khas_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'JPD KHAS' table."];
jpd_khas_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'JPD KHAS' table."];
jpd_khas_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'JPD KHAS' table."];

// pams_khas table
pams_khas_addTip=["",spacer+"This option allows all members of the group to add records to the 'PAMS KHAS ' table. A member who adds a record to the table becomes the 'owner' of that record."];

pams_khas_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'PAMS KHAS ' table."];
pams_khas_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'PAMS KHAS ' table."];
pams_khas_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'PAMS KHAS ' table."];
pams_khas_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'PAMS KHAS ' table."];

pams_khas_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'PAMS KHAS ' table."];
pams_khas_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'PAMS KHAS ' table."];
pams_khas_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'PAMS KHAS ' table."];
pams_khas_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'PAMS KHAS ' table, regardless of their owner."];

pams_khas_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'PAMS KHAS ' table."];
pams_khas_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'PAMS KHAS ' table."];
pams_khas_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'PAMS KHAS ' table."];
pams_khas_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'PAMS KHAS ' table."];

// jpd_noc table
jpd_noc_addTip=["",spacer+"This option allows all members of the group to add records to the 'JPD NOC' table. A member who adds a record to the table becomes the 'owner' of that record."];

jpd_noc_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'JPD NOC' table."];
jpd_noc_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'JPD NOC' table."];
jpd_noc_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'JPD NOC' table."];
jpd_noc_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'JPD NOC' table."];

jpd_noc_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'JPD NOC' table."];
jpd_noc_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'JPD NOC' table."];
jpd_noc_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'JPD NOC' table."];
jpd_noc_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'JPD NOC' table, regardless of their owner."];

jpd_noc_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'JPD NOC' table."];
jpd_noc_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'JPD NOC' table."];
jpd_noc_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'JPD NOC' table."];
jpd_noc_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'JPD NOC' table."];

// pams_noc table
pams_noc_addTip=["",spacer+"This option allows all members of the group to add records to the 'PAMS NOC' table. A member who adds a record to the table becomes the 'owner' of that record."];

pams_noc_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'PAMS NOC' table."];
pams_noc_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'PAMS NOC' table."];
pams_noc_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'PAMS NOC' table."];
pams_noc_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'PAMS NOC' table."];

pams_noc_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'PAMS NOC' table."];
pams_noc_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'PAMS NOC' table."];
pams_noc_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'PAMS NOC' table."];
pams_noc_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'PAMS NOC' table, regardless of their owner."];

pams_noc_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'PAMS NOC' table."];
pams_noc_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'PAMS NOC' table."];
pams_noc_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'PAMS NOC' table."];
pams_noc_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'PAMS NOC' table."];

// balb table
balb_addTip=["",spacer+"This option allows all members of the group to add records to the 'BEKALAN AIR' table. A member who adds a record to the table becomes the 'owner' of that record."];

balb_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'BEKALAN AIR' table."];
balb_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'BEKALAN AIR' table."];
balb_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'BEKALAN AIR' table."];
balb_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'BEKALAN AIR' table."];

balb_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'BEKALAN AIR' table."];
balb_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'BEKALAN AIR' table."];
balb_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'BEKALAN AIR' table."];
balb_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'BEKALAN AIR' table, regardless of their owner."];

balb_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'BEKALAN AIR' table."];
balb_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'BEKALAN AIR' table."];
balb_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'BEKALAN AIR' table."];
balb_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'BEKALAN AIR' table."];

// JALB table
JALB_addTip=["",spacer+"This option allows all members of the group to add records to the 'JALB' table. A member who adds a record to the table becomes the 'owner' of that record."];

JALB_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'JALB' table."];
JALB_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'JALB' table."];
JALB_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'JALB' table."];
JALB_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'JALB' table."];

JALB_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'JALB' table."];
JALB_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'JALB' table."];
JALB_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'JALB' table."];
JALB_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'JALB' table, regardless of their owner."];

JALB_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'JALB' table."];
JALB_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'JALB' table."];
JALB_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'JALB' table."];
JALB_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'JALB' table."];

// BELB table
BELB_addTip=["",spacer+"This option allows all members of the group to add records to the 'BELB' table. A member who adds a record to the table becomes the 'owner' of that record."];

BELB_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'BELB' table."];
BELB_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'BELB' table."];
BELB_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'BELB' table."];
BELB_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'BELB' table."];

BELB_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'BELB' table."];
BELB_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'BELB' table."];
BELB_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'BELB' table."];
BELB_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'BELB' table, regardless of their owner."];

BELB_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'BELB' table."];
BELB_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'BELB' table."];
BELB_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'BELB' table."];
BELB_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'BELB' table."];

// pprt table
pprt_addTip=["",spacer+"This option allows all members of the group to add records to the 'PPRT' table. A member who adds a record to the table becomes the 'owner' of that record."];

pprt_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'PPRT' table."];
pprt_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'PPRT' table."];
pprt_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'PPRT' table."];
pprt_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'PPRT' table."];

pprt_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'PPRT' table."];
pprt_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'PPRT' table."];
pprt_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'PPRT' table."];
pprt_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'PPRT' table, regardless of their owner."];

pprt_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'PPRT' table."];
pprt_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'PPRT' table."];
pprt_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'PPRT' table."];
pprt_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'PPRT' table."];

// ljk table
ljk_addTip=["",spacer+"This option allows all members of the group to add records to the 'LJK FASA 10' table. A member who adds a record to the table becomes the 'owner' of that record."];

ljk_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'LJK FASA 10' table."];
ljk_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'LJK FASA 10' table."];
ljk_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'LJK FASA 10' table."];
ljk_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'LJK FASA 10' table."];

ljk_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'LJK FASA 10' table."];
ljk_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'LJK FASA 10' table."];
ljk_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'LJK FASA 10' table."];
ljk_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'LJK FASA 10' table, regardless of their owner."];

ljk_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'LJK FASA 10' table."];
ljk_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'LJK FASA 10' table."];
ljk_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'LJK FASA 10' table."];
ljk_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'LJK FASA 10' table."];

// pemohon_jpd table
pemohon_jpd_addTip=["",spacer+"This option allows all members of the group to add records to the 'MOHON JPD' table. A member who adds a record to the table becomes the 'owner' of that record."];

pemohon_jpd_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'MOHON JPD' table."];
pemohon_jpd_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'MOHON JPD' table."];
pemohon_jpd_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'MOHON JPD' table."];
pemohon_jpd_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'MOHON JPD' table."];

pemohon_jpd_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'MOHON JPD' table."];
pemohon_jpd_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'MOHON JPD' table."];
pemohon_jpd_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'MOHON JPD' table."];
pemohon_jpd_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'MOHON JPD' table, regardless of their owner."];

pemohon_jpd_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'MOHON JPD' table."];
pemohon_jpd_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'MOHON JPD' table."];
pemohon_jpd_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'MOHON JPD' table."];
pemohon_jpd_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'MOHON JPD' table."];

// pams_mohon table
pams_mohon_addTip=["",spacer+"This option allows all members of the group to add records to the 'MOHON PAMS' table. A member who adds a record to the table becomes the 'owner' of that record."];

pams_mohon_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'MOHON PAMS' table."];
pams_mohon_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'MOHON PAMS' table."];
pams_mohon_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'MOHON PAMS' table."];
pams_mohon_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'MOHON PAMS' table."];

pams_mohon_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'MOHON PAMS' table."];
pams_mohon_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'MOHON PAMS' table."];
pams_mohon_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'MOHON PAMS' table."];
pams_mohon_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'MOHON PAMS' table, regardless of their owner."];

pams_mohon_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'MOHON PAMS' table."];
pams_mohon_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'MOHON PAMS' table."];
pams_mohon_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'MOHON PAMS' table."];
pams_mohon_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'MOHON PAMS' table."];

// pemohon_pprt table
pemohon_pprt_addTip=["",spacer+"This option allows all members of the group to add records to the 'MOHON PPRT' table. A member who adds a record to the table becomes the 'owner' of that record."];

pemohon_pprt_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'MOHON PPRT' table."];
pemohon_pprt_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'MOHON PPRT' table."];
pemohon_pprt_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'MOHON PPRT' table."];
pemohon_pprt_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'MOHON PPRT' table."];

pemohon_pprt_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'MOHON PPRT' table."];
pemohon_pprt_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'MOHON PPRT' table."];
pemohon_pprt_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'MOHON PPRT' table."];
pemohon_pprt_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'MOHON PPRT' table, regardless of their owner."];

pemohon_pprt_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'MOHON PPRT' table."];
pemohon_pprt_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'MOHON PPRT' table."];
pemohon_pprt_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'MOHON PPRT' table."];
pemohon_pprt_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'MOHON PPRT' table."];

// negeri table
negeri_addTip=["",spacer+"This option allows all members of the group to add records to the 'Negeri' table. A member who adds a record to the table becomes the 'owner' of that record."];

negeri_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Negeri' table."];
negeri_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Negeri' table."];
negeri_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Negeri' table."];
negeri_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Negeri' table."];

negeri_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Negeri' table."];
negeri_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Negeri' table."];
negeri_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Negeri' table."];
negeri_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Negeri' table, regardless of their owner."];

negeri_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Negeri' table."];
negeri_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Negeri' table."];
negeri_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Negeri' table."];
negeri_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Negeri' table."];

// daerah table
daerah_addTip=["",spacer+"This option allows all members of the group to add records to the 'Daerah' table. A member who adds a record to the table becomes the 'owner' of that record."];

daerah_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Daerah' table."];
daerah_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Daerah' table."];
daerah_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Daerah' table."];
daerah_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Daerah' table."];

daerah_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Daerah' table."];
daerah_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Daerah' table."];
daerah_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Daerah' table."];
daerah_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Daerah' table, regardless of their owner."];

daerah_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Daerah' table."];
daerah_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Daerah' table."];
daerah_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Daerah' table."];
daerah_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Daerah' table."];

// Dun table
Dun_addTip=["",spacer+"This option allows all members of the group to add records to the 'Dun' table. A member who adds a record to the table becomes the 'owner' of that record."];

Dun_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Dun' table."];
Dun_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Dun' table."];
Dun_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Dun' table."];
Dun_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Dun' table."];

Dun_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Dun' table."];
Dun_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Dun' table."];
Dun_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Dun' table."];
Dun_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Dun' table, regardless of their owner."];

Dun_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Dun' table."];
Dun_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Dun' table."];
Dun_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Dun' table."];
Dun_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Dun' table."];

// PARLIMEN table
PARLIMEN_addTip=["",spacer+"This option allows all members of the group to add records to the 'PARLIMEN' table. A member who adds a record to the table becomes the 'owner' of that record."];

PARLIMEN_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'PARLIMEN' table."];
PARLIMEN_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'PARLIMEN' table."];
PARLIMEN_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'PARLIMEN' table."];
PARLIMEN_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'PARLIMEN' table."];

PARLIMEN_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'PARLIMEN' table."];
PARLIMEN_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'PARLIMEN' table."];
PARLIMEN_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'PARLIMEN' table."];
PARLIMEN_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'PARLIMEN' table, regardless of their owner."];

PARLIMEN_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'PARLIMEN' table."];
PARLIMEN_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'PARLIMEN' table."];
PARLIMEN_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'PARLIMEN' table."];
PARLIMEN_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'PARLIMEN' table."];

// kelulusan table
kelulusan_addTip=["",spacer+"This option allows all members of the group to add records to the 'Kelulusan' table. A member who adds a record to the table becomes the 'owner' of that record."];

kelulusan_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Kelulusan' table."];
kelulusan_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Kelulusan' table."];
kelulusan_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Kelulusan' table."];
kelulusan_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Kelulusan' table."];

kelulusan_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Kelulusan' table."];
kelulusan_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Kelulusan' table."];
kelulusan_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Kelulusan' table."];
kelulusan_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Kelulusan' table, regardless of their owner."];

kelulusan_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Kelulusan' table."];
kelulusan_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Kelulusan' table."];
kelulusan_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Kelulusan' table."];
kelulusan_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Kelulusan' table."];

// status_pelaksanaan table
status_pelaksanaan_addTip=["",spacer+"This option allows all members of the group to add records to the 'Status pelaksanaan' table. A member who adds a record to the table becomes the 'owner' of that record."];

status_pelaksanaan_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Status pelaksanaan' table."];
status_pelaksanaan_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Status pelaksanaan' table."];
status_pelaksanaan_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Status pelaksanaan' table."];
status_pelaksanaan_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Status pelaksanaan' table."];

status_pelaksanaan_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Status pelaksanaan' table."];
status_pelaksanaan_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Status pelaksanaan' table."];
status_pelaksanaan_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Status pelaksanaan' table."];
status_pelaksanaan_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Status pelaksanaan' table, regardless of their owner."];

status_pelaksanaan_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Status pelaksanaan' table."];
status_pelaksanaan_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Status pelaksanaan' table."];
status_pelaksanaan_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Status pelaksanaan' table."];
status_pelaksanaan_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Status pelaksanaan' table."];

// status_kelulusan_jpd table
status_kelulusan_jpd_addTip=["",spacer+"This option allows all members of the group to add records to the 'Kelulusan JPD' table. A member who adds a record to the table becomes the 'owner' of that record."];

status_kelulusan_jpd_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Kelulusan JPD' table."];
status_kelulusan_jpd_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Kelulusan JPD' table."];
status_kelulusan_jpd_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Kelulusan JPD' table."];
status_kelulusan_jpd_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Kelulusan JPD' table."];

status_kelulusan_jpd_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Kelulusan JPD' table."];
status_kelulusan_jpd_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Kelulusan JPD' table."];
status_kelulusan_jpd_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Kelulusan JPD' table."];
status_kelulusan_jpd_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Kelulusan JPD' table, regardless of their owner."];

status_kelulusan_jpd_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Kelulusan JPD' table."];
status_kelulusan_jpd_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Kelulusan JPD' table."];
status_kelulusan_jpd_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Kelulusan JPD' table."];
status_kelulusan_jpd_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Kelulusan JPD' table."];

// status_kelulusan_pams table
status_kelulusan_pams_addTip=["",spacer+"This option allows all members of the group to add records to the 'Kelulusan PAMS' table. A member who adds a record to the table becomes the 'owner' of that record."];

status_kelulusan_pams_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Kelulusan PAMS' table."];
status_kelulusan_pams_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Kelulusan PAMS' table."];
status_kelulusan_pams_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Kelulusan PAMS' table."];
status_kelulusan_pams_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Kelulusan PAMS' table."];

status_kelulusan_pams_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Kelulusan PAMS' table."];
status_kelulusan_pams_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Kelulusan PAMS' table."];
status_kelulusan_pams_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Kelulusan PAMS' table."];
status_kelulusan_pams_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Kelulusan PAMS' table, regardless of their owner."];

status_kelulusan_pams_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Kelulusan PAMS' table."];
status_kelulusan_pams_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Kelulusan PAMS' table."];
status_kelulusan_pams_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Kelulusan PAMS' table."];
status_kelulusan_pams_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Kelulusan PAMS' table."];

// status_kelulusan_pprt table
status_kelulusan_pprt_addTip=["",spacer+"This option allows all members of the group to add records to the 'Kelulusan PPRT' table. A member who adds a record to the table becomes the 'owner' of that record."];

status_kelulusan_pprt_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Kelulusan PPRT' table."];
status_kelulusan_pprt_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Kelulusan PPRT' table."];
status_kelulusan_pprt_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Kelulusan PPRT' table."];
status_kelulusan_pprt_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Kelulusan PPRT' table."];

status_kelulusan_pprt_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Kelulusan PPRT' table."];
status_kelulusan_pprt_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Kelulusan PPRT' table."];
status_kelulusan_pprt_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Kelulusan PPRT' table."];
status_kelulusan_pprt_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Kelulusan PPRT' table, regardless of their owner."];

status_kelulusan_pprt_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Kelulusan PPRT' table."];
status_kelulusan_pprt_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Kelulusan PPRT' table."];
status_kelulusan_pprt_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Kelulusan PPRT' table."];
status_kelulusan_pprt_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Kelulusan PPRT' table."];

// tahun table
tahun_addTip=["",spacer+"This option allows all members of the group to add records to the 'Tahun' table. A member who adds a record to the table becomes the 'owner' of that record."];

tahun_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Tahun' table."];
tahun_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Tahun' table."];
tahun_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Tahun' table."];
tahun_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Tahun' table."];

tahun_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Tahun' table."];
tahun_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Tahun' table."];
tahun_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Tahun' table."];
tahun_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Tahun' table, regardless of their owner."];

tahun_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Tahun' table."];
tahun_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Tahun' table."];
tahun_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Tahun' table."];
tahun_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Tahun' table."];

// penyelia_projek table
penyelia_projek_addTip=["",spacer+"This option allows all members of the group to add records to the 'Penyelia projek' table. A member who adds a record to the table becomes the 'owner' of that record."];

penyelia_projek_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Penyelia projek' table."];
penyelia_projek_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Penyelia projek' table."];
penyelia_projek_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Penyelia projek' table."];
penyelia_projek_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Penyelia projek' table."];

penyelia_projek_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Penyelia projek' table."];
penyelia_projek_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Penyelia projek' table."];
penyelia_projek_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Penyelia projek' table."];
penyelia_projek_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Penyelia projek' table, regardless of their owner."];

penyelia_projek_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Penyelia projek' table."];
penyelia_projek_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Penyelia projek' table."];
penyelia_projek_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Penyelia projek' table."];
penyelia_projek_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Penyelia projek' table."];

// agensi_pelaksana table
agensi_pelaksana_addTip=["",spacer+"This option allows all members of the group to add records to the 'Agensi pelaksana' table. A member who adds a record to the table becomes the 'owner' of that record."];

agensi_pelaksana_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Agensi pelaksana' table."];
agensi_pelaksana_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Agensi pelaksana' table."];
agensi_pelaksana_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Agensi pelaksana' table."];
agensi_pelaksana_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Agensi pelaksana' table."];

agensi_pelaksana_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Agensi pelaksana' table."];
agensi_pelaksana_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Agensi pelaksana' table."];
agensi_pelaksana_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Agensi pelaksana' table."];
agensi_pelaksana_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Agensi pelaksana' table, regardless of their owner."];

agensi_pelaksana_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Agensi pelaksana' table."];
agensi_pelaksana_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Agensi pelaksana' table."];
agensi_pelaksana_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Agensi pelaksana' table."];
agensi_pelaksana_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Agensi pelaksana' table."];

// agensi_bayar table
agensi_bayar_addTip=["",spacer+"This option allows all members of the group to add records to the 'Agensi bayar' table. A member who adds a record to the table becomes the 'owner' of that record."];

agensi_bayar_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Agensi bayar' table."];
agensi_bayar_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Agensi bayar' table."];
agensi_bayar_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Agensi bayar' table."];
agensi_bayar_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Agensi bayar' table."];

agensi_bayar_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Agensi bayar' table."];
agensi_bayar_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Agensi bayar' table."];
agensi_bayar_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Agensi bayar' table."];
agensi_bayar_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Agensi bayar' table, regardless of their owner."];

agensi_bayar_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Agensi bayar' table."];
agensi_bayar_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Agensi bayar' table."];
agensi_bayar_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Agensi bayar' table."];
agensi_bayar_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Agensi bayar' table."];

// waran table
waran_addTip=["",spacer+"This option allows all members of the group to add records to the 'Waran' table. A member who adds a record to the table becomes the 'owner' of that record."];

waran_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Waran' table."];
waran_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Waran' table."];
waran_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Waran' table."];
waran_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Waran' table."];

waran_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Waran' table."];
waran_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Waran' table."];
waran_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Waran' table."];
waran_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Waran' table, regardless of their owner."];

waran_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Waran' table."];
waran_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Waran' table."];
waran_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Waran' table."];
waran_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Waran' table."];

// jpd_de_REKOD table
jpd_de_REKOD_addTip=["",spacer+"This option allows all members of the group to add records to the 'REKOD JPD DE' table. A member who adds a record to the table becomes the 'owner' of that record."];

jpd_de_REKOD_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'REKOD JPD DE' table."];
jpd_de_REKOD_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'REKOD JPD DE' table."];
jpd_de_REKOD_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'REKOD JPD DE' table."];
jpd_de_REKOD_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'REKOD JPD DE' table."];

jpd_de_REKOD_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'REKOD JPD DE' table."];
jpd_de_REKOD_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'REKOD JPD DE' table."];
jpd_de_REKOD_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'REKOD JPD DE' table."];
jpd_de_REKOD_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'REKOD JPD DE' table, regardless of their owner."];

jpd_de_REKOD_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'REKOD JPD DE' table."];
jpd_de_REKOD_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'REKOD JPD DE' table."];
jpd_de_REKOD_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'REKOD JPD DE' table."];
jpd_de_REKOD_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'REKOD JPD DE' table."];

// pams_DE_REKOD table
pams_DE_REKOD_addTip=["",spacer+"This option allows all members of the group to add records to the 'REKOD PAMS DE' table. A member who adds a record to the table becomes the 'owner' of that record."];

pams_DE_REKOD_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'REKOD PAMS DE' table."];
pams_DE_REKOD_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'REKOD PAMS DE' table."];
pams_DE_REKOD_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'REKOD PAMS DE' table."];
pams_DE_REKOD_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'REKOD PAMS DE' table."];

pams_DE_REKOD_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'REKOD PAMS DE' table."];
pams_DE_REKOD_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'REKOD PAMS DE' table."];
pams_DE_REKOD_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'REKOD PAMS DE' table."];
pams_DE_REKOD_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'REKOD PAMS DE' table, regardless of their owner."];

pams_DE_REKOD_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'REKOD PAMS DE' table."];
pams_DE_REKOD_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'REKOD PAMS DE' table."];
pams_DE_REKOD_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'REKOD PAMS DE' table."];
pams_DE_REKOD_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'REKOD PAMS DE' table."];

// jpd_test table
jpd_test_addTip=["",spacer+"This option allows all members of the group to add records to the 'JPD test' table. A member who adds a record to the table becomes the 'owner' of that record."];

jpd_test_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'JPD test' table."];
jpd_test_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'JPD test' table."];
jpd_test_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'JPD test' table."];
jpd_test_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'JPD test' table."];

jpd_test_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'JPD test' table."];
jpd_test_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'JPD test' table."];
jpd_test_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'JPD test' table."];
jpd_test_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'JPD test' table, regardless of their owner."];

jpd_test_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'JPD test' table."];
jpd_test_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'JPD test' table."];
jpd_test_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'JPD test' table."];
jpd_test_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'JPD test' table."];

// skop_jpd table
skop_jpd_addTip=["",spacer+"This option allows all members of the group to add records to the 'Skop jpd' table. A member who adds a record to the table becomes the 'owner' of that record."];

skop_jpd_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Skop jpd' table."];
skop_jpd_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Skop jpd' table."];
skop_jpd_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Skop jpd' table."];
skop_jpd_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Skop jpd' table."];

skop_jpd_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Skop jpd' table."];
skop_jpd_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Skop jpd' table."];
skop_jpd_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Skop jpd' table."];
skop_jpd_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Skop jpd' table, regardless of their owner."];

skop_jpd_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Skop jpd' table."];
skop_jpd_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Skop jpd' table."];
skop_jpd_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Skop jpd' table."];
skop_jpd_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Skop jpd' table."];

// skop_pams table
skop_pams_addTip=["",spacer+"This option allows all members of the group to add records to the 'Skop pams' table. A member who adds a record to the table becomes the 'owner' of that record."];

skop_pams_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Skop pams' table."];
skop_pams_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Skop pams' table."];
skop_pams_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Skop pams' table."];
skop_pams_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Skop pams' table."];

skop_pams_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Skop pams' table."];
skop_pams_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Skop pams' table."];
skop_pams_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Skop pams' table."];
skop_pams_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Skop pams' table, regardless of their owner."];

skop_pams_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Skop pams' table."];
skop_pams_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Skop pams' table."];
skop_pams_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Skop pams' table."];
skop_pams_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Skop pams' table."];

// Syarikat table
Syarikat_addTip=["",spacer+"This option allows all members of the group to add records to the 'Syarikat Berjaya' table. A member who adds a record to the table becomes the 'owner' of that record."];

Syarikat_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Syarikat Berjaya' table."];
Syarikat_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Syarikat Berjaya' table."];
Syarikat_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Syarikat Berjaya' table."];
Syarikat_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Syarikat Berjaya' table."];

Syarikat_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Syarikat Berjaya' table."];
Syarikat_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Syarikat Berjaya' table."];
Syarikat_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Syarikat Berjaya' table."];
Syarikat_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Syarikat Berjaya' table, regardless of their owner."];

Syarikat_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Syarikat Berjaya' table."];
Syarikat_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Syarikat Berjaya' table."];
Syarikat_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Syarikat Berjaya' table."];
Syarikat_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Syarikat Berjaya' table."];

// Syarikat_baru table
Syarikat_baru_addTip=["",spacer+"This option allows all members of the group to add records to the 'Syarikat Berdaftar' table. A member who adds a record to the table becomes the 'owner' of that record."];

Syarikat_baru_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Syarikat Berdaftar' table."];
Syarikat_baru_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Syarikat Berdaftar' table."];
Syarikat_baru_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Syarikat Berdaftar' table."];
Syarikat_baru_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Syarikat Berdaftar' table."];

Syarikat_baru_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Syarikat Berdaftar' table."];
Syarikat_baru_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Syarikat Berdaftar' table."];
Syarikat_baru_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Syarikat Berdaftar' table."];
Syarikat_baru_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Syarikat Berdaftar' table, regardless of their owner."];

Syarikat_baru_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Syarikat Berdaftar' table."];
Syarikat_baru_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Syarikat Berdaftar' table."];
Syarikat_baru_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Syarikat Berdaftar' table."];
Syarikat_baru_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Syarikat Berdaftar' table."];

// ekasih table
ekasih_addTip=["",spacer+"This option allows all members of the group to add records to the 'Ekasih' table. A member who adds a record to the table becomes the 'owner' of that record."];

ekasih_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Ekasih' table."];
ekasih_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Ekasih' table."];
ekasih_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Ekasih' table."];
ekasih_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Ekasih' table."];

ekasih_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Ekasih' table."];
ekasih_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Ekasih' table."];
ekasih_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Ekasih' table."];
ekasih_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Ekasih' table, regardless of their owner."];

ekasih_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Ekasih' table."];
ekasih_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Ekasih' table."];
ekasih_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Ekasih' table."];
ekasih_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Ekasih' table."];

// BLACKLIST table
BLACKLIST_addTip=["",spacer+"This option allows all members of the group to add records to the 'BLACKLIST' table. A member who adds a record to the table becomes the 'owner' of that record."];

BLACKLIST_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'BLACKLIST' table."];
BLACKLIST_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'BLACKLIST' table."];
BLACKLIST_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'BLACKLIST' table."];
BLACKLIST_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'BLACKLIST' table."];

BLACKLIST_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'BLACKLIST' table."];
BLACKLIST_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'BLACKLIST' table."];
BLACKLIST_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'BLACKLIST' table."];
BLACKLIST_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'BLACKLIST' table, regardless of their owner."];

BLACKLIST_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'BLACKLIST' table."];
BLACKLIST_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'BLACKLIST' table."];
BLACKLIST_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'BLACKLIST' table."];
BLACKLIST_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'BLACKLIST' table."];

// LJK_JENIS table
LJK_JENIS_addTip=["",spacer+"This option allows all members of the group to add records to the 'LJK JENIS' table. A member who adds a record to the table becomes the 'owner' of that record."];

LJK_JENIS_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'LJK JENIS' table."];
LJK_JENIS_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'LJK JENIS' table."];
LJK_JENIS_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'LJK JENIS' table."];
LJK_JENIS_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'LJK JENIS' table."];

LJK_JENIS_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'LJK JENIS' table."];
LJK_JENIS_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'LJK JENIS' table."];
LJK_JENIS_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'LJK JENIS' table."];
LJK_JENIS_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'LJK JENIS' table, regardless of their owner."];

LJK_JENIS_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'LJK JENIS' table."];
LJK_JENIS_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'LJK JENIS' table."];
LJK_JENIS_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'LJK JENIS' table."];
LJK_JENIS_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'LJK JENIS' table."];

// Laporan_N9_fiz table
Laporan_N9_fiz_addTip=["",spacer+"This option allows all members of the group to add records to the 'FIZIKAL N.SEMBILAN' table. A member who adds a record to the table becomes the 'owner' of that record."];

Laporan_N9_fiz_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'FIZIKAL N.SEMBILAN' table."];
Laporan_N9_fiz_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'FIZIKAL N.SEMBILAN' table."];
Laporan_N9_fiz_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'FIZIKAL N.SEMBILAN' table."];
Laporan_N9_fiz_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'FIZIKAL N.SEMBILAN' table."];

Laporan_N9_fiz_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'FIZIKAL N.SEMBILAN' table."];
Laporan_N9_fiz_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'FIZIKAL N.SEMBILAN' table."];
Laporan_N9_fiz_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'FIZIKAL N.SEMBILAN' table."];
Laporan_N9_fiz_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'FIZIKAL N.SEMBILAN' table, regardless of their owner."];

Laporan_N9_fiz_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'FIZIKAL N.SEMBILAN' table."];
Laporan_N9_fiz_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'FIZIKAL N.SEMBILAN' table."];
Laporan_N9_fiz_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'FIZIKAL N.SEMBILAN' table."];
Laporan_N9_fiz_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'FIZIKAL N.SEMBILAN' table."];

// Kew_n9 table
Kew_n9_addTip=["",spacer+"This option allows all members of the group to add records to the 'KEWANGAN NEGERI SEMBILAN' table. A member who adds a record to the table becomes the 'owner' of that record."];

Kew_n9_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'KEWANGAN NEGERI SEMBILAN' table."];
Kew_n9_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'KEWANGAN NEGERI SEMBILAN' table."];
Kew_n9_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'KEWANGAN NEGERI SEMBILAN' table."];
Kew_n9_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'KEWANGAN NEGERI SEMBILAN' table."];

Kew_n9_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'KEWANGAN NEGERI SEMBILAN' table."];
Kew_n9_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'KEWANGAN NEGERI SEMBILAN' table."];
Kew_n9_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'KEWANGAN NEGERI SEMBILAN' table."];
Kew_n9_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'KEWANGAN NEGERI SEMBILAN' table, regardless of their owner."];

Kew_n9_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'KEWANGAN NEGERI SEMBILAN' table."];
Kew_n9_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'KEWANGAN NEGERI SEMBILAN' table."];
Kew_n9_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'KEWANGAN NEGERI SEMBILAN' table."];
Kew_n9_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'KEWANGAN NEGERI SEMBILAN' table."];

// Laporan_MLK_fiz table
Laporan_MLK_fiz_addTip=["",spacer+"This option allows all members of the group to add records to the 'FIZIKAL MELAKA' table. A member who adds a record to the table becomes the 'owner' of that record."];

Laporan_MLK_fiz_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'FIZIKAL MELAKA' table."];
Laporan_MLK_fiz_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'FIZIKAL MELAKA' table."];
Laporan_MLK_fiz_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'FIZIKAL MELAKA' table."];
Laporan_MLK_fiz_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'FIZIKAL MELAKA' table."];

Laporan_MLK_fiz_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'FIZIKAL MELAKA' table."];
Laporan_MLK_fiz_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'FIZIKAL MELAKA' table."];
Laporan_MLK_fiz_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'FIZIKAL MELAKA' table."];
Laporan_MLK_fiz_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'FIZIKAL MELAKA' table, regardless of their owner."];

Laporan_MLK_fiz_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'FIZIKAL MELAKA' table."];
Laporan_MLK_fiz_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'FIZIKAL MELAKA' table."];
Laporan_MLK_fiz_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'FIZIKAL MELAKA' table."];
Laporan_MLK_fiz_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'FIZIKAL MELAKA' table."];

// Kew_MLK table
Kew_MLK_addTip=["",spacer+"This option allows all members of the group to add records to the 'KEWANGAN MELAKA' table. A member who adds a record to the table becomes the 'owner' of that record."];

Kew_MLK_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'KEWANGAN MELAKA' table."];
Kew_MLK_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'KEWANGAN MELAKA' table."];
Kew_MLK_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'KEWANGAN MELAKA' table."];
Kew_MLK_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'KEWANGAN MELAKA' table."];

Kew_MLK_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'KEWANGAN MELAKA' table."];
Kew_MLK_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'KEWANGAN MELAKA' table."];
Kew_MLK_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'KEWANGAN MELAKA' table."];
Kew_MLK_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'KEWANGAN MELAKA' table, regardless of their owner."];

Kew_MLK_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'KEWANGAN MELAKA' table."];
Kew_MLK_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'KEWANGAN MELAKA' table."];
Kew_MLK_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'KEWANGAN MELAKA' table."];
Kew_MLK_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'KEWANGAN MELAKA' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
