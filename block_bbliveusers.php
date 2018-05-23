<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || exit(0);

/**
 * @package block_bbliveusers
 * @author Bruno Magalhães <brunomagalhaes@blackbean.com.br>
 * @copyright BlackBean Technologies Ltda <https://www.blackbean.com.br>
 * @license http://www.gnu.org/copyleft/gpl.html
 */
class block_bbliveusers extends block_base
{
    /**
     * [init]
     *
     * @return void
     */
    public function init() {
        $this->title = get_string('title_live', 'block_bbliveusers');
    }

    /**
     * [get_content]
     *
     * @return stdclass
     */
    public function get_content() {
        global $COURSE;

        $courseid = isset($COURSE->id) ? max(0, (integer)$COURSE->id) : 0;
        $limit = 20;

        if($this->content !== null) {
            return($this->content);
        }

        $this->content = new stdClass;
        $this->content->header = '';
        $this->content->text = '<div id="block-bbliveusers-chart"><noscript>'.get_string('message_javascript', 'block_bbliveusers').'</noscript></div>';
        $this->content->footer = '<link type="text/css" href="/blocks/bbliveusers/chartist.css" media="all" rel="stylesheet"/>';
        $this->content->footer .= '<script type="text/javascript" src="/blocks/bbliveusers/chartist.js"></script>';
        $this->content->footer .= '<script type="text/javascript">
var toggle = 0;
var labels = ["","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",];
var values = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
var chart = new Chartist.Bar("#block-bbliveusers-chart",{series:[values]},{
fullWidth: true,
seriesBarDistance: 0,
chartPadding: {
    top: 20,
    left: 0,
    right: 0,
    botton: 0},
axisX: {
    onlyInteger: true,
    showLabel: true,
    showGrid: false,
    offset: 15
},
axisY: {
    onlyInteger: true,
    showLabel: true,
    showGrid: true,
    offset: 30
}});
window.setInterval(function(){
    if(window.XMLHttpRequest){
        request = new XMLHttpRequest();
    }else{
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    request.onreadystatechange = function(){
        if(this.readyState == 4){
            if(this.status == 200){
                if(response = JSON.parse(request.responseText)){
                    if(time = parseInt(response.time)){
                        if(label = new Date(time * 1000)){
                            hours = parseInt(label.getHours());
                            minutes = parseInt(label.getMinutes());
                            seconds = parseInt(label.getSeconds());
                            seconds = (seconds - (seconds % '.$limit.'));
                            if(hours < 10) hours = "0" + hours;
                            if(minutes < 10) minutes = "0" + minutes;
                            if(seconds < 10) seconds = "0" + seconds;
                            if((toggle == 0) || (toggle % 5) == 0){
                                labels.push(hours + ":" + minutes + ":" + seconds);
                            }else{
                                labels.push("");
                            }
                        }else{
                            labels.push("");
                        }
                    }else{
                        labels.push("");
                    }
                    if(value = parseInt(response.data)){
                        values.push(value);
                    }else{
                        values.push(0);
                    }
                    labels.shift();
                    values.shift();
                    if(block = document.getElementById("block-bbliveusers-chart")){
                        if(block.clientWidth < 200){
                            chart.update({labels:labels.slice(-10),
                                            series:[values.slice(-10)]});
                        } else if(block.clientWidth < 400){
                            chart.update({labels:labels.slice(-20),
                                            series:[values.slice(-20)]});
                        } else if(block.clientWidth < 600){
                            chart.update({labels:labels.slice(-30),
                                            series:[values.slice(-30)]});
                        } else if(block.clientWidth < 800){
                            chart.update({labels:labels.slice(-40),
                                            series:[values.slice(-40)]});
                        } else {
                            chart.update({labels:labels,
                                            series:[values]});
                        }
                    } else {
                        chart.update({labels:labels,
                                        series:[values]});
                    }
                    toggle += 1;
                }
            }
        }
    };
    request.open("GET","/local/bbliveusers/count.php?courseid='.$courseid.'&limit='.$limit.'",true);
    request.send();
}, '.$limit.'*1000);
</script>';

        return($this->content);
    }
}