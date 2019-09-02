export default function debounce(callback, deley) {
  let timer;

  return (...args) => {
    if (timer) clearTimeout(timer);

    timer = setTimeout(() => {
      callback(...args);
      timer = null;
    }, deley);
  };
}
