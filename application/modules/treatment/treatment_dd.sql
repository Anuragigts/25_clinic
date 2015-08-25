DROP TABLE %db_prefix%treatments;
DELETE FROM %db_prefix%navigation_menu WHERE menu_name = 'treatment';
DELETE FROM %db_prefix%modules WHERE module_name = 'treatment';
