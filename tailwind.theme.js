const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    
    theme: {
       
        fontFamily: {
            'sans': ['neue-haas-grotesk-display', ...defaultTheme.fontFamily.sans],
            'nhg-text': ['neue-haas-grotesk-text', ...defaultTheme.fontFamily.sans],
        },

       
        container: {
            padding: {
                DEFAULT:  '20px',
                lg:       '80px',
            },
            center: true,
        },
        extend: {
            colors: {
              'background': '#F9F7F3',
              'green': '#009540',
              'off-black': '#1E1E1E',
              'off-white': '#F9F7F3',
              'tertiary': '#EEF1F4',
            },
        },
       
      },

}