class AlertDisappearance {
  constructor(element, delay) {
    this.element = element;
    this.delay = delay;
  }

  start() {
    setTimeout(() => {
      this.hide();
    }, this.delay);
  }

  hide() {
    $(this.element).fadeOut(500, function () {
      $(this).slideUp(500, function () {
        $(this).remove();
      });
    });
  }
}

const alertElement = document.getElementById("alert");
const alertDisappearance = new AlertDisappearance(alertElement, 3000); // 3000 milliseconds (3 seconds)
alertDisappearance.start();
