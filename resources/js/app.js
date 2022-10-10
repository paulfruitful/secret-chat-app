import './bootstrap';

const channel=Echo.private('chat')
  .listen('MessageSent', (e) => {
   console.log(e);
  });

channel.subscribed(()=>{
 console.log('Channel is subscribed')

})