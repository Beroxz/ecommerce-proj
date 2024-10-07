import Swal from "sweetalert2";
import './style-toast.css'

const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  iconColor: "white",
  customClass: {
    popup: "colored-toast",
  },
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: false,
});

export default Toast;
