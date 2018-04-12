# moodle-local_bbliveusers
BlackBean Live Users (https://github.com/blackbean/BBLiveUsers) is a plugin for the Moodle LMS Platform (https://www.moodle.org) that monitors the exact number of online users per course in realtime, even if they spend hours watching a single video, for example, without ever refreshing a single page.

This plugin was conceived because many of our corporate clients had the exactly same problem with Online Users Block: when a user stays longer than 5 minutes whatching a video, they are not considered as an online user anymore. Course, we could adjust the block's minutes threshold but it gets more and more inacurate as higher we go. This is a very big problem when we have all day live events such as video streams. This plugins helped us to have a very precise idea and also allowed our clients to generate accurated reports.

The BlackBean Live Users plugin is splitted into two distinct but interdependent parts the local_bbliveusers and block_bbliveusers:

The first one, local_bbliveusers, is the core library and API responsible for processing, storing, reading and exporting the users live data. By default, the core library only stores user data three times per minute (or in twenty seconds increments) this helps us to keep the data consumption under control.

The second, block_bbliveusers, is the user block were you can watch in realtime live users count in a chart and it's context aware so, if you place it within the course context it will only show that course live users, but if you place it within the control painel it will show all live users within all courses. This it's also smart enough to detect the width where it's placed and adjust the number of bars to display.

IT'S ALSO VERY IMPORTANT TO NOTE THAT THIS PLUGIN WILL ONLY TRACK USERS INSIDE COURSES (ITS ACTIVITIES) AND NOT WITHIN OTHER MOODLE PAGES SUCH AS SITE ADMINISTRATION PAGES.