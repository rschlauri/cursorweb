# PHP Web Project

A modern, responsive website built with PHP, HTML, CSS, and JavaScript. This project demonstrates modern web development practices with a beautiful UI and interactive features.

## Features

- 🎨 **Modern Design**: Clean and responsive design that works on all devices
- ⚡ **Fast Performance**: Optimized code for quick loading and smooth interactions
- 🛡️ **Secure**: Built with security best practices in mind
- 📱 **Mobile Responsive**: Fully responsive design for all screen sizes
- 🎯 **Interactive**: Smooth animations and user interactions
- 📊 **Visitor Tracking**: Simple visitor counter using cookies
- 📝 **Contact Form**: Functional contact form with validation
- 🌟 **Modern UI**: Beautiful gradients, shadows, and animations

## Project Structure

```
cursor-web/
├── index.php          # Main homepage with PHP functionality
├── process.php        # Form processing and validation
├── css/
│   └── style.css     # Modern CSS with responsive design
├── js/
│   └── script.js     # Interactive JavaScript features
├── contact_log.txt   # Contact form submissions log
└── README.md         # This file
```

## Setup Instructions

### Prerequisites

- PHP 7.4 or higher
- Web server (Apache, Nginx, or PHP built-in server)

### Installation

1. **Clone or download the project files**

2. **Set up a local web server**

   **Option A: Using PHP Built-in Server**
   ```bash
   # Navigate to the project directory
   cd cursor-web
   
   # Start PHP development server
   php -S localhost:8000
   ```

   **Option B: Using XAMPP/WAMP/MAMP**
   - Copy the project files to your web server's document root
   - Access via `http://localhost/cursor-web`

3. **Access the website**
   - Open your browser and go to `http://localhost:8000` (if using PHP built-in server)
   - Or `http://localhost/cursor-web` (if using XAMPP/WAMP/MAMP)

## Features Explained

### 1. Visitor Counter
- Uses PHP cookies to track unique visits
- Displays current year and time
- Updates in real-time

### 2. Contact Form
- Client-side validation with JavaScript
- Server-side validation with PHP
- Form data logging to `contact_log.txt`
- Success/error notifications

### 3. Responsive Design
- Mobile-first approach
- CSS Grid and Flexbox layouts
- Smooth animations and transitions
- Modern typography with Google Fonts

### 4. Interactive Elements
- Smooth scrolling navigation
- Hover effects and animations
- Form validation with real-time feedback
- Parallax scrolling effects

## Customization

### Colors
The main color scheme uses a purple gradient. To change colors, edit the CSS variables in `css/style.css`:

```css
/* Main gradient colors */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
```

### Content
- Edit `index.php` to change the main content
- Modify the hero section, about section, or contact form
- Update the navigation menu items

### Styling
- All styles are in `css/style.css`
- The design uses CSS Grid and Flexbox for layouts
- Animations are defined with CSS keyframes

## Security Features

- Input sanitization in PHP
- Email validation
- CSRF protection (can be enhanced)
- Secure form processing
- Error handling and logging

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Performance Optimizations

- Minified CSS and JS (can be implemented)
- Optimized images (add your own)
- Efficient CSS animations
- Lazy loading (can be implemented)

## Future Enhancements

- Database integration (MySQL/PostgreSQL)
- User authentication system
- Admin panel
- Blog functionality
- Image gallery
- SEO optimization
- PWA features

## Troubleshooting

### Common Issues

1. **PHP not working**
   - Ensure PHP is installed and configured
   - Check if the web server is running

2. **Styles not loading**
   - Check if the `css/` directory exists
   - Verify file permissions

3. **Form not submitting**
   - Check if `process.php` exists and is accessible
   - Verify PHP error logs

4. **JavaScript not working**
   - Check browser console for errors
   - Ensure `js/script.js` is accessible

## License

This project is open source and available under the [MIT License](LICENSE).

## Contributing

Feel free to contribute to this project by:
- Reporting bugs
- Suggesting new features
- Submitting pull requests
- Improving documentation

## Support

If you need help with this project, please:
1. Check the troubleshooting section
2. Review the code comments
3. Create an issue with detailed information

---

**Happy Coding! 🚀** 