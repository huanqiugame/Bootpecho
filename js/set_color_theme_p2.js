/*!
 * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2024 The Bootstrap Authors
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 */

(() => {
    'use strict'
    const getStoredTheme = () => localStorage.getItem('theme')
    const setStoredTheme = theme => localStorage.setItem('theme', theme)
    
    const getPreferredTheme = () => {
      const storedTheme = getStoredTheme()
      if (storedTheme) {
        return storedTheme
      }
  
      // return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
      // ======= Customization starts =======
      return 'auto'
      // ======= Customization ends =======
    }
    
    const setTheme = theme => {
      if (theme === 'auto') {
        document.documentElement.setAttribute('data-bs-theme', (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'))
      } else {
        document.documentElement.setAttribute('data-bs-theme', theme)
      }
    }
    
    const showActiveTheme = (theme, focus = false) => {
      const themeSwitcher = document.querySelector('#bd-theme')
  
      if (!themeSwitcher) {
        return
      }
  
      const themeSwitcherText = document.querySelector('#bd-theme-text')
      // const activeThemeIcon = document.querySelector('.theme-icon-active use')
      const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
      // const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href')
  
      document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
        // element.classList.remove('active')
        // ======= Customization starts (line(s) above are original) =======
        element.classList.remove('disabled')
        // ======= Customization ends =======
        element.setAttribute('aria-pressed', 'false')
      })
      // ======= Customization starts =======
      function translateThemeName(text) {
        if (text === 'light' || text === 'dark' || text === 'auto') {
          return document.querySelector(`[data-bs-theme-value="${text}"]`).textContent
        } else {
          return text
        }
      }
      // ======= Customization ends =======

      // btnToActive.classList.add('active')
      // ======= Customization starts (line(s) above are original) =======
      btnToActive.classList.add('disabled')
      // ======= Customization ends =======
      btnToActive.setAttribute('aria-pressed', 'true')
      // activeThemeIcon.setAttribute('href', svgOfActiveBtn)
      const themeSwitcherLabel = `${themeSwitcherText.textContent} ${translateThemeName(btnToActive.dataset.bsThemeValue)}`
      themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)
      // ======= Customization starts =======
      document.querySelector('#bd-theme-status').textContent = translateThemeName(btnToActive.dataset.bsThemeValue)
      // ======= Customization ends =======
  
      if (focus) {
        themeSwitcher.focus()
      }
    }
  
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
      const storedTheme = getStoredTheme()
      if (storedTheme !== 'light' && storedTheme !== 'dark') {
        setTheme(getPreferredTheme())
      }
    })
  
    window.addEventListener('DOMContentLoaded', () => {
      showActiveTheme(getPreferredTheme())
  
      document.querySelectorAll('[data-bs-theme-value]')
        .forEach(toggle => {
          toggle.addEventListener('click', () => {
            const theme = toggle.getAttribute('data-bs-theme-value')
            setStoredTheme(theme)
            setTheme(theme)
            showActiveTheme(theme, true)
          })
        })
    })
  })()