import { ref } from 'vue';

export default function useSnackbar() {
  const message = ref('');
  const snackbar = ref(false);

  function showSnackbar(newMessage) {
    message.value = newMessage;
    snackbar.value = true;

    //hide the snackbar after 3 seconds
    setTimeout(() => {
      snackbar.value = false;
      message.value = '';
    }, 3000);
  }

  return {
    message,
    snackbar,
    showSnackbar,
  };
}
