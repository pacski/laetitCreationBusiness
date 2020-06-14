window._ = require('lodash')

try {
    window.Popper = require('popper.js').default
    window.$ = window.jQuery = require('jquery')
    console.log('load-admin')

} catch (e) {
    console.log(e)
}