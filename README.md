### grab-screen-from-phone

![banner](https://i.imgur.com/TWTTtb2.png)

Displaying your phone's screen on a web server

### Requirements

- PHP 7.4+
- [ext-gd](https://www.php.net/manual/en/book.image.php) for image processing
- [`adb`](https://developer.android.com/studio/releases/platform-tools) command is available in your `$PATH`

### Features

- image filename is saved as `Y_m_d_H_i_s-phone_model.png` (can)
- Linux and Windows is supported
- ultra lightweight

### Running

```bash
php -S 0.0.0.0:8080
```
