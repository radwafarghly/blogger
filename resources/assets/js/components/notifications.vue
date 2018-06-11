<template>
            <li class="dropdown" >
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="glyphicon glyphicon-globe"></span> Notifications
                    <span class="badge alert-danger">{{unreadNotifications.length}}</span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        {{unreadNotifications}}
                        <hr>
                    </li>
                </ul>
       </li>
</template>

<script>
    //  import NotificationItem from './NotificationItem.vue';
    export default {
          props: ['unreads', 'userid'],
        //   components: {NotificationItem},

         data(){
            return {
               unreadNotifications: this.unreads
            }
        },
        mounted() {
            console.log('Component mounted.')
            Echo.private('App.User.'+ this.userid)
                .notification((notification) => {
                    console.log(notification);
                    var newUnreadNotifications = {post: notification.post, user: notification.user};
                    console.log(newUnreadNotifications);
                    this.unreadNotifications = newUnreadNotifications;
                });
        }
    }
</script>
