<?php
/*
  Plugin Name:  My Own Search Filter 
  Description:  Filtre les résultats de recherche
  Plugin URI:   http://www.yvangodard.me
  Version:      1.0
  Author:       Yvan GODARD
  Author URI:   http://www.yvangodard.me
/*
  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.
 
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
 
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/
 
function bac_filter_wp_search($query) { 
    //Filter Search only in the front-end and not in the Admin.
    if (!$query->is_admin && $query->is_search) {
    //Search in Posts & Pages only. Excludes Attachments and CPTs.
    $query->set('post_type', array('post', 'page'));
    //Excludes specific Pages and Posts by ID. Separated by comma.
    //Previous events : 2446
    //Download bow (multilingual) : 491, 944-955
    //Home (right column multilingual) : 1523, 1526, 1530, 1532, 1535, 1538, 1541, 1544, 1547, 1549, 1552, 1555, 1558
	//Home (left column multilingual) : 1469, 1472-1483
	//Home (next activities - multilingual) : 1496, 1499-1510
    $query->set('post__not_in', array(2446,491,944,945,946,947,948,949,950,951,952,953,954,955,1523,1526,1530,1532,1535,1538,1541,1544,1547,1549,1552,1555,1558,1469,1472,1473,1474,1475,1476,1477,1478,1479,1480,1481,1482,1483,1496,1499,1501,1502,1503,1504,1505,1506,1507,1508,1509,1510));
    }
    return $query;
}
add_filter('pre_get_posts','bac_filter_wp_search');
?>