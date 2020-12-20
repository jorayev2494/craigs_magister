/*=========================================================================================
  File Name: i18n.js
  Description: i18n configuration file. Imports i18n data.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue';
import VueI18n from 'vue-i18n';
import i18nData from './i18nData';
import EN from '../../src/i18n/lang/en.json';
import RU from '../../src/i18n/lang/ru.json';
// import DE from '@/i18n/lang/de.json';
// import FR from '@/i18n/lang/fr.json';
// import PT from '@/i18n/lang/pt.json';


Vue.use(VueI18n)

export default new VueI18n({
  locale: 'en', // set default locale
  fallbackLocale: 'en',
  // messages: i18nData,
  messages: {
    en: EN,
    ru: RU,
    // de: DE,
    // fr: FR,
    // pl: PT,
  }
})
