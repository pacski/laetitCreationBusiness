window._ = require('lodash')

try {
    window.Popper = require('popper.js').default
    window.$ = window.jQuery = require('jquery')
    require('./command')
    require('./product')
    require('./stock')
    console.log('load-front')

} catch (e) {
    console.log(e)
}