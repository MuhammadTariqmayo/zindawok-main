@extends('website_layouts.master')
@section('content')



<style>
    .zindawork-survey-content {
        font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        outline: 0;
        position: relative;
        margin: 0;
        overflow: hidden;
        text-transform: initial;
        letter-spacing: normal;
        text-align: left
    }

    .zindawork-survey-content *,
    .zindawork-survey-content :after,
    .zindawork-survey-content :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-tap-highlight-color: transparent;
        -webkit-tap-highlight-color: transparent;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%
    }

    .zindawork-survey-content a,
    .zindawork-survey-content button,
    .zindawork-survey-content div,
    .zindawork-survey-content form,
    .zindawork-survey-content input,
    .zindawork-survey-content label,
    .zindawork-survey-content span {
        border: 0;
        outline: 0;
        font-size: 100%;
        line-height: initial;
        vertical-align: baseline;
        background: 0 0;
        margin: 0;
        padding: 0;
        float: none;
        width: auto
    }

    .zindawork-survey-content a,
    .zindawork-survey-content button,
    .zindawork-survey-content input+label {
        cursor: pointer
    }

    .zindawork-survey-content .mopicon {
        display: inline-block;
        vertical-align: middle
    }

    .zindawork-survey-content .mopicon svg {
        user-select: none;
        width: 1em;
        height: 1em;
        display: inline-block;
        flex-shrink: 0;
        font-size: inherit
    }

    .zindawork-survey-content #surveyHead {
        padding: 20px 35px 20px 20px;
        margin-bottom: 20px
    }

    .zindawork-survey-content .control-group {
        padding: 20px;
        position: relative
    }

    .zindawork-survey-content .form-actions {
        position: relative;
        padding: 20px 20px 40px;
        margin: 0
    }

    .zindawork-survey-content a:active,
    .zindawork-survey-content a:focus,
    .zindawork-survey-content a:hover {
        outline: 0
    }

    .zindawork-survey-content button,
    .zindawork-survey-content input,
    .zindawork-survey-content select,
    .zindawork-survey-content textarea {
        margin: 0;
        font-size: inherit;
        vertical-align: middle
    }

    .zindawork-survey-content button,
    .zindawork-survey-content input {
        line-height: normal
    }

    .zindawork-survey-content button::-moz-focus-inner,
    .zindawork-survey-content input::-moz-focus-inner {
        padding: 0;
        border: 0
    }

    .zindawork-survey-content button,
    .zindawork-survey-content input[type=reset],
    .zindawork-survey-content input[type=submit],
    .zindawork-survey-content input[type=button] {
        cursor: pointer;
        -webkit-appearance: button
    }

    .zindawork-survey-content button,
    .zindawork-survey-content input[type=button],
    .zindawork-survey-content input[type=checkbox],
    .zindawork-survey-content input[type=radio],
    .zindawork-survey-content input[type=reset],
    .zindawork-survey-content input[type=submit],
    .zindawork-survey-content select {
        cursor: pointer
    }

    .zindawork-survey-content input[type=search]::-webkit-search-cancel-button,
    .zindawork-survey-content input[type=search]::-webkit-search-decoration {
        -webkit-appearance: none
    }

    .zindawork-survey-content textarea {
        overflow: auto;
        vertical-align: top
    }

    #surveyBody,
    .zindawork-survey-content {
        font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        font-size: 14px;
        line-height: 1.4;
        color: #212121;
        border-radius: 0;
        position: relative
    }

    .zindawork-survey-content .zindawork-survey-output {
        background: #fff
    }

    .zindawork-survey-content .is-modal {
        font-size: 14px
    }

    #surveyBody {
        margin: 0;
        width: 100%
    }

    .zindawork-survey-content a {
        color: #08c;
        text-decoration: none;
        cursor: pointer
    }

    .zindawork-survey-content a:focus,
    .zindawork-survey-content a:hover {
        color: #005580;
        text-decoration: underline
    }

    .zindawork-survey-content a.btn:focus,
    .zindawork-survey-content a.btn:hover {
        text-decoration: none
    }

    .zindawork-survey-content h1,
    .zindawork-survey-content h2,
    .zindawork-survey-content h3,
    .zindawork-survey-content h4,
    .zindawork-survey-content h5,
    .zindawork-survey-content h6 {
        margin: 10px 0 20px;
        font-family: inherit;
        color: inherit;
        text-rendering: optimizelegibility;
        font-weight: 700;
        font-weight: 600
    }

    .zindawork-survey-content #surveyHead h1 {
        margin: 0
    }

    .zindawork-survey-content h1 {
        font-size: 1.6em;
        line-height: 1.4
    }

    .zindawork-survey-content h2 {
        font-size: 1.4em
    }

    .zindawork-survey-content h3 {
        font-size: 1.2em
    }

    .zindawork-survey-content h4 {
        font-size: 1.1em
    }

    .zindawork-survey-content h5 {
        font-size: 1em
    }

    .zindawork-survey-content h6 {
        font-size: .8em
    }

    .zindawork-survey-content .main-title {
        margin-bottom: 0
    }

    .zindawork-survey-content .section-title {
        margin-top: 0
    }

    .zindawork-survey-content .section-title:empty {
        margin: 0
    }

    .zindawork-survey-content .section.absolute .block-title {
        display: none
    }

    .zindawork-survey-content .section-screenshot {
        color: #727272;
        cursor: pointer;
        position: relative;
        display: inline-block;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .12), 0 1px 5px 0 rgba(0, 0, 0, .2);
        padding: 2px 8px;
        border: 2px solid transparent;
        -webkit-transition: border linear .2s, box-shadow linear .2s;
        transition: border linear .2s, box-shadow linear .2s;
        z-index: 5;
        border-radius: 3px;
        line-height: 1
    }

    .zindawork-survey-content .section-screenshot .mopicon-camera {
        font-size: 28px
    }

    .zindawork-survey-content .section-screenshot:hover {
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12), 0 2px 4px -1px rgba(0, 0, 0, .2)
    }

    .zindawork-survey-content .section-screenshot.tooltip:hover {
        background-color: transparent;
        color: #616161
    }

    .zindawork-survey-content .section-screenshot.tooltip>span.tooltip {
        position: absolute;
        left: 0;
        top: 0;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 6px;
        min-width: 0;
        background: #000;
        background: rgba(0, 0, 0, .7);
        border: 0;
        color: #fff;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        opacity: 0;
        visibility: hidden;
        transition: all .3s;
        min-width: 200px;
        -webkit-transform: translateY(-100%);
        -ms-transform: translateY(-100%);
        transform: translateY(-100%)
    }

    .zindawork-survey-content .section-screenshot.tooltip:hover>span.tooltip {
        visibility: visible;
        opacity: 1
    }

    .zindawork-survey-content .section-screenshot .detect-capture {
        display: none;
        position: absolute;
        bottom: -8px;
        right: -8px;
        width: 16px;
        height: 16px;
        line-height: 16px;
        font-size: 9px;
        color: #fff;
        background: #4caf50;
        border-radius: 100%;
        text-align: center
    }

    .zindawork-survey-content .section.absolute {
        padding: 0 20px 10px 20px;
        margin-top: -20px
    }

    .zindawork-survey-content .section.absolute .block-title {
        display: none
    }

    .zindawork-survey-content .section-screenshot {
        color: #727272;
        cursor: pointer
    }

    .zindawork-survey-content .section-screenshot.tooltip {
        display: inline-block;
        height: auto;
        background-color: transparent;
        position: relative;
        border-radius: 0;
        cursor: pointer;
        color: #727272
    }

    .zindawork-survey-content .section-screenshot.tooltip:hover {
        background-color: transparent;
        color: #616161
    }

    .zindawork-survey-content .section-screenshot.tooltip:hover>span,
    .zindawork-survey-content .section-screenshot.tooltip>span {
        top: 26px;
        left: 40px
    }

    .zindawork-survey-content fieldset {
        padding: 0;
        margin: 0;
        border: 0
    }

    .zindawork-survey-content div.block-title,
    .zindawork-survey-content legend {
        display: block;
        width: 100%;
        padding: 0;
        margin: 0 0 8px;
        font-size: inherit;
        line-height: inherit;
        color: inherit;
        border: 0;
        position: relative
    }

    .zindawork-survey-content .block-title {
        font-size: 1em;
        font-weight: 400
    }

    .zindawork-survey-content .block-title label {
        display: inline
    }

    .zindawork-survey-content .block-title:after {
        content: '';
        display: none;
        width: 30px;
        height: 2px;
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: #b3e5fc
    }

    .zindawork-survey-content .block-title.has-tooltip,
    .zindawork-survey-content .control-group.has-tooltip .block-title {
        position: relative;
        padding-right: 40px
    }

    .zindawork-survey-content div[id^=user_input] {
        margin-top: 10px
    }

    .zindawork-survey-content label {
        display: block;
        margin-bottom: 5px
    }

    .zindawork-survey-content select,
    .zindawork-survey-content textarea {
        display: inline-block;
        height: 40px;
        padding: 6px 6px;
        margin: 0;
        font-size: 1em;
        font-family: inherit;
        line-height: inherit;
        color: inherit;
        vertical-align: middle;
        -webkit-border-radius: 2px;
        border-radius: 3px;
        -webkit-appearance: none
    }

    .zindawork-survey-content input,
    .zindawork-survey-content textarea {
        width: 100%;
        min-width: 0
    }

    .zindawork-survey-content textarea {
        height: auto;
        min-height: 70px
    }

    .zindawork-survey-content textarea {
        background-color: #fff;
        border: 1px solid #ddd;
        -webkit-transition: border linear .2s, box-shadow linear .2s;
        -moz-transition: border linear .2s, box-shadow linear .2s;
        -o-transition: border linear .2s, box-shadow linear .2s;
        transition: border linear .2s, box-shadow linear .2s
    }

    .zindawork-survey-content textarea:focus {
        border-color: #03a9f4;
        outline: 0;
        -webkit-box-shadow: 0 0 0 1px #0288d1;
        -moz-box-shadow: 0 0 0 1px #0288d1;
        box-shadow: 0 0 0 1px #03a9f4
    }

    .zindawork-survey-content input[type=checkbox],
    .zindawork-survey-content input[type=radio] {
        margin: 4px 0 0;
        line-height: normal
    }

    .zindawork-survey-content input::-moz-placeholder,
    .zindawork-survey-content textarea::-moz-placeholder {
        color: #b6b6b6;
        font-weight: 700;
        font-weight: 600;
        font-size: 90%
    }

    .zindawork-survey-content input::-webkit-input-placeholder,
    .zindawork-survey-content textarea::-webkit-input-placeholder {
        color: #b6b6b6;
        font-weight: 700;
        font-weight: 600;
        font-size: 90%
    }

    .zindawork-survey-content .email-wrapper div,
    .zindawork-survey-content .name-wrapper div,
    .zindawork-survey-content .title-wrapper div {
        -webkit-box-flex: 1;
        -webkit-flex: 1 0 auto;
        -ms-flex: 1 0 auto;
        flex: 1 0 auto;
        margin-right: 5px
    }

    .zindawork-survey-content input[type=checkbox],
    .zindawork-survey-content input[type=radio] {
        height: 0;
        width: 0 !important;
        min-width: 0 !important;
        position: absolute;
        left: -999px
    }

    .zindawork-survey-content input[type=checkbox]+label,
    .zindawork-survey-content input[type=radio]+label {
        position: relative;
        color: #727272;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 5px 0 5px 50px;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        display: block
    }

    .zindawork-survey-content input[type=checkbox]:checked+label,
    .zindawork-survey-content input[type=radio]:checked+label {
        color: #212121
    }

    .zindawork-survey-content input[type=radio]+label:before {
        content: '';
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        margin-top: 2.5px;
        margin-left: 5px;
        height: 24px;
        width: 24px;
        border-radius: 100%;
        border: 1px solid #b6b6b6;
        visibility: visible;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease
    }

    .zindawork-survey-content input[type=radio]+label:after {
        display: block;
        content: '';
        height: 18px;
        width: 18px;
        color: #fff;
        visibility: visible;
        position: absolute;
        top: 0;
        left: 0;
        margin-top: 5.5px;
        margin-left: 8px;
        background: #03a9f4;
        border-radius: 100%;
        opacity: 0;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease
    }

    .zindawork-survey-content input[type=radio]+label:hover:after {
        -webkit-transform: scale(.45);
        -ms-transform: scale(.45);
        transform: scale(.45);
        opacity: 1
    }

    .zindawork-survey-content input[type=radio]+label:active:after,
    .zindawork-survey-content input[type=radio]+label:focus:after {
        -webkit-transform: scale(.65);
        -ms-transform: scale(.65);
        transform: scale(.65);
        box-shadow: 0 0 0 20px #b3e5fc;
        box-shadow: 0 0 0 20px rgba(179, 229, 252, .5);
        opacity: 1
    }

    .zindawork-survey-content input[type=radio]:checked+label:before {
        border-color: #03a9f4
    }

    .zindawork-survey-content input[type=radio]:checked+label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .zindawork-survey-content .button-container {
        display: block;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-flow: row wrap;
        flex-flow: row wrap;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden
    }

    .zindawork-survey-content .category-wrapper.button,
    .zindawork-survey-content .radio-wrapper.button {
        display: inline-block;
        -webkit-box-flex: 0 1 auto;
        -webkit-flex: 0 1 auto;
        -ms-flex: 0 1 auto;
        flex: 0 1 auto;
        min-width: 20%;
        background: 0 0;
        line-height: inherit
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label {
        padding: 8px 16px;
        border: 1px solid #ddd;
        border-radius: 3px;
        margin-right: 5px;
        color: #727272;
        background-color: #fff;
        overflow: hidden;
        font-weight: 400;
        font-weight: 600;
        text-align: center
    }

    @media screen and (max-width:992px) {

        .zindawork-survey-content .category-wrapper.button,
        .zindawork-survey-content .radio-wrapper.button {
            min-width: 33%
        }
    }

    .zindawork-survey-content .is-modal [class*='-wrapper'].button {
        min-width: 33%
    }

    @media screen and (max-width:400px) {
        .zindawork-survey-content .button-container:not(.thumbs-container) {
            display: block;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-flow: column wrap;
            flex-flow: column wrap
        }

        .zindawork-survey-content .category-wrapper.button,
        .zindawork-survey-content .radio-wrapper.button {
            min-width: 100%
        }

        .zindawork-survey-content .category-wrapper.button input[type=radio]+label,
        .zindawork-survey-content .radio-wrapper.button input[type=radio]+label {
            text-align: left;
            padding-left: 24px
        }
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:hover,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:hover {
        border-color: #03a9f4;
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12), 0 2px 4px -1px rgba(0, 0, 0, .2);
        -webkit-transform: translateY(-1px);
        -ms-transform: translateY(-1px);
        transform: translateY(-1px);
        z-index: 2
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:active,
    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:focus,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:active,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:focus {
        border-color: #03a9f4;
        color: #03a9f4;
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
        z-index: 2
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]:checked+label,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:checked+label {
        border-color: #03a9f4;
        color: #212121;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:after,
    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:before,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:after,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:before {
        content: none
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label .is-context-icon {
        color: #fff;
        width: auto;
        height: auto;
        background: 0 0;
        border: 0;
        font-size: 14px;
        top: 50%;
        left: 0;
        margin-top: -8.5px;
        margin-left: 0;
        -webkit-transform: translate(-200%, 0);
        -ms-transform: translate(-200%, 0);
        transform: translate(-200%, 0);
        font-weight: 400
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:hover .is-context-icon,
    .zindawork-survey-content .category-wrapper.button input[type=radio]:active+label .is-context-icon,
    .zindawork-survey-content .category-wrapper.button input[type=radio]:checked+label .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:hover .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:active+label .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:checked+label .is-context-icon {
        color: inherit
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]:checked+label .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:checked+label .is-context-icon {
        -webkit-transform: translate(5px, 0);
        -ms-transform: translate(5px, 0);
        transform: translate(5px, 0)
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]:checked:active+label,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:checked:active+label {
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9)
    }

    .zindawork-survey-content .rating-group.has-legend {
        padding-bottom: 20px
    }

    .zindawork-survey-content .btn,
    .zindawork-survey-content button {
        display: inline-block;
        margin: 0;
        padding: 12px 24px;
        font-size: 1em;
        line-height: 1;
        text-align: center;
        font-weight: 400;
        font-weight: 400;
        vertical-align: middle;
        position: relative;
        background-color: #fff;
        border: 1px solid #ddd;
        color: #202021;
        outline: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        -webkit-transition: all .3s cubic-bezier(.25, .8, .25, 1);
        transition: all .3s cubic-bezier(.25, .8, .25, 1);
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .12), 0 1px 5px 0 rgba(0, 0, 0, .2);
        z-index: 2;
        font-family: inherit;
        letter-spacing: normal;
        text-transform: none;
        width: auto;
        max-width: none;
        min-width: none;
        max-height: none;
        min-height: none
    }

    .zindawork-survey-content .btn:focus,
    .zindawork-survey-content .btn:hover,
    .zindawork-survey-content .btn[disabled] {
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12), 0 2px 4px -1px rgba(0, 0, 0, .2);
        -webkit-transform: translateY(-1px);
        -ms-transform: translateY(-1px);
        transform: translateY(-1px)
    }

    .zindawork-survey-content .btn:active {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
    }

    .zindawork-survey-content .btn-previous .is-context-icon {
        display: inline-block;
        margin-right: 10px;
        color: inherit;
        -webkit-transition: -webkit-transform .3s;
        transition: transform .3s
    }

    .zindawork-survey-content .btn-previous:active .is-context-icon,
    .zindawork-survey-content .btn-previous:focus .is-context-icon,
    .zindawork-survey-content .btn-previous:hover .is-context-icon {
        -webkit-transform: translate(-3px, 0);
        -ms-transform: translate(-3px, 0);
        transform: translate(-3px, 0)
    }

    .zindawork-survey-content .btn-next,
    .zindawork-survey-content .btn-primary {
        font-weight: 600;
        background-color: #03a9f4;
        border: 1px solid #03a9f4;
        color: #fff
    }

    .zindawork-survey-content .btn-next:active,
    .zindawork-survey-content .btn-next:focus,
    .zindawork-survey-content .btn-next:hover,
    .zindawork-survey-content .btn-next[disabled],
    .zindawork-survey-content .btn-primary:active,
    .zindawork-survey-content .btn-primary:focus,
    .zindawork-survey-content .btn-primary:hover,
    .zindawork-survey-content .btn-primary[disabled] {
        background-color: #0288d1;
        border-color: #0288d1;
        color: #fff
    }

    .zindawork-survey-content .btn-next .is-context-icon {
        display: inline-block;
        margin-left: 10px;
        -webkit-transition: -webkit-transform .3s;
        transition: transform .3s
    }

    .zindawork-survey-content .btn-submit .is-context-icon {
        display: inline-block;
        margin-left: 10px;
        font-size: 12px;
        vertical-align: middle;
        -webkit-transition: -webkit-transform .3s;
        transition: transform .3s
    }

    @-webkit-keyframes scaleInOut {
        30% {
            -webkit-transform: scale(.2);
            transform: scale(.2)
        }

        100% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @keyframes scaleInOut {
        30% {
            -webkit-transform: scale(.2);
            transform: scale(.2)
        }

        100% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @-webkit-keyframes scaleOutIn {
        30% {
            -webkit-transform-origin: right center;
            transform-origin: right center;
            -webkit-transform: scale(2);
            transform: scale(2)
        }

        100% {
            -webkit-transform-origin: right center;
            transform-origin: right center;
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @keyframes scaleOutIn {
        30% {
            -webkit-transform-origin: right center;
            transform-origin: right center;
            -webkit-transform: scale(2);
            transform: scale(2)
        }

        100% {
            -webkit-transform-origin: right center;
            transform-origin: right center;
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @-webkit-keyframes mopicon-spin {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg)
        }
    }

    @keyframes mopicon-spin {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg)
        }
    }

    @media screen and (max-width:360px) {
        .zindawork-survey-content .form-actions {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-flow: column wrap;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-flow: column wrap;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center
        }

        .zindawork-survey-content .btn-next,
        .zindawork-survey-content .btn-submit {
            -webkit-box-ordinal-group: 1;
            -ms-flex-order: 1;
            order: 1
        }

        .zindawork-survey-content .btn-previous {
            -webkit-box-ordinal-group: 2;
            -ms-flex-order: 2;
            order: 2;
            margin-top: 5px
        }

        .zindawork-survey-content .form-actions .btn {
            box-shadow: none;
            border-radius: 0;
            width: 100%
        }
    }

    .zindawork-survey-content .btn[disabled] {
        opacity: .4
    }

    .zindawork-survey-content .btn-block {
        display: block;
        width: 100%;
        padding-right: 0;
        padding-left: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    .zindawork-survey-content .btn-block+.btn-block {
        margin-top: 5px
    }

    .zindawork-survey-content input[type=button].btn-block,
    .zindawork-survey-content input[type=reset].btn-block,
    .zindawork-survey-content input[type=submit].btn-block {
        width: 100%
    }

    .zindawork-survey-content button.btn::-moz-focus-inner,
    .zindawork-survey-content input[type=submit].btn::-moz-focus-inner {
        padding: 0;
        border: 0
    }

    @keyframes errorFadeIn {
        from {
            -webkit-transform: translate(-10px, 0);
            transform: translate(-10px, 0);
            opacity: 0
        }

        to {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
            opacity: 1
        }
    }

    @keyframes errorFadeIn {
        from {
            -webkit-transform: translate(-10px, 0);
            -moz-transform: translate(-10px, 0);
            transform: translate(-10px, 0);
            opacity: 0
        }

        to {
            -webkit-transform: translate(0, 0);
            -moz-transform: translate(0, 0);
            transform: translate(0, 0);
            opacity: 1
        }
    }

    .zindawork-survey-content .pull-right {
        float: right
    }

    .zindawork-survey-content .pull-left {
        float: left
    }

    .zindawork-survey-content .show {
        display: block
    }

    .zindawork-survey-content a.tooltip {
        display: block;
        height: 20px;
        line-height: 20px;
        width: 20px;
        position: relative;
        margin: 0;
        color: #fff;
        background: #b6b6b6;
        font-size: 12px;
        text-align: center;
        border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        -webkit-transition: all .15s linear;
        -moz-transition: all .15s linear;
        -o-transition: all .15s linear;
        transition: all .15s ease;
        position: absolute;
        top: 0;
        right: 0
    }

    .zindawork-survey-content a.tooltip:hover {
        border-color: #616161;
        background: #616161;
        color: #fff
    }

    .zindawork-survey-content a.tooltip:hover {
        text-decoration: none
    }

    .zindawork-survey-content a.tooltip div {
        position: absolute;
        right: 0;
        top: 0;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 6px;
        min-width: 0;
        background: #000;
        background: rgba(0, 0, 0, .7);
        border: 0;
        color: #fff;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        opacity: 0;
        visibility: hidden;
        transition: all .3s;
        min-width: 200px;
        -webkit-transform: translateY(-100%);
        -ms-transform: translateY(-100%);
        transform: translateY(-100%)
    }

    .zindawork-survey-content a.tooltip:hover div {
        visibility: visible;
        opacity: 1
    }

    .zindawork-survey-content a.tooltip span {
        display: block;
        background: 0 0 !important
    }

    .zindawork-survey-content .rating-group {
        display: block
    }

    .zindawork-survey-content .rating-group:after {
        content: '';
        display: table;
        clear: both
    }

    .zindawork-survey-content .rating-group.emoji {
        display: table;
        border-spacing: 0;
        table-layout: fixed;
        width: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden
    }

    .zindawork-survey-content .rating-group .choice-row {
        display: table-row
    }

    .zindawork-survey-content .rating-group input[type=radio] {
        height: 0;
        width: 0;
        margin: 0;
        position: absolute;
        left: -9999px
    }

    .zindawork-survey-content .rating-group input[type=radio]+label:after,
    .zindawork-survey-content .rating-group input[type=radio]+label:before {
        content: none
    }

    .zindawork-survey-content .rating-group label {
        display: block;
        vertical-align: middle;
        text-align: center;
        cursor: pointer;
        border: 1px solid #ddd;
        background: #fff;
        color: #727272;
        font-size: 1em;
        font-style: normal !important;
        font-weight: 400;
        font-weight: 600;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease
    }

    .zindawork-survey-content .rating-choice {
        display: table-cell
    }

    .zindawork-survey-content .rating-choice:last-of-type {
        padding-right: 0
    }

    .zindawork-survey-content .rating-group input[type=radio]+label {
        display: block;
        width: 100%;
        height: auto;
        padding: 10px 0;
        margin: 0;
        border-left: 0;
        position: relative;
        overflow: visible
    }

    .zindawork-survey-content .rating-group input[type=radio]+label:hover,
    .zindawork-survey-content .rating-group input[type=radio]:checked+label {
        border-left: 1px solid
    }

    .zindawork-survey-content .rating-group .choice-row>div:first-of-type input[type=radio]+label {
        border-left: 1px solid #ddd
    }

    .zindawork-survey-content .rating-group input[type=radio]:hover+label {
        background: #03a9f4;
        border-color: #03a9f4;
        color: #fff;
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12), 0 2px 4px -1px rgba(0, 0, 0, .2);
        -webkit-transform: translateY(-1px) scale(1.05);
        -ms-transform: translateY(-1px) scale(1.05);
        transform: translateY(-1px) scale(1.05);
        z-index: 2
    }

    .zindawork-survey-content .rating-group input[type=radio]:active+label,
    .zindawork-survey-content .rating-group input[type=radio]:focus+label {
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
        z-index: 3
    }

    .zindawork-survey-content .rating-group input[type=radio]:checked+label {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        background: #03a9f4;
        border-color: #03a9f4;
        color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
    }

    .zindawork-survey-content .rating-group input[type=radio]:checked:active+label {
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9)
    }

    .zindawork-survey-content .rating-group.emoji {
        max-width: 380px
    }

    .zindawork-survey-content .control-group .rating-group.emoji input[type=radio]+label {
        border: 0 !important;
        padding: 10px;
        background: #fff !important
    }

    .zindawork-survey-content .rating-group.emoji.show-labels input[type=radio]+label:before {
        content: attr(data-label);
        position: absolute;
        left: 50%;
        right: auto;
        top: auto;
        bottom: 0;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 6px;
        width: auto !important;
        background: #616161;
        background: rgba(97, 97, 97, .9);
        border: 0;
        color: #fff;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        opacity: 0;
        visibility: hidden;
        -webkit-transform: translate(-50%, 100%);
        -ms-transform: translate(-50%, 100%);
        transform: translate(-50%, 100%);
        text-align: center;
        display: block;
        margin: 0 !important;
        height: auto;
        visibility: visible;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease
    }

    .zindawork-survey-content .rating-group.emoji.show-labels input[type=radio]:checked+label:before,
    .zindawork-survey-content .rating-group.emoji.show-labels input[type=radio]:hover+label:before {
        visibility: visible;
        opacity: 1
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label:before {
        -webkit-transform: translate(-50%, 75%);
        -ms-transform: translate(-50%, 75%);
        transform: translate(-50%, 75%)
    }

    @media screen and (max-width:400px) {
        .zindawork-survey-content .rating-group.emoji input[type=radio]+label {
            padding: 5px 10px
        }
    }

    @media screen and (max-width:350px) {
        .zindawork-survey-content .rating-group.emoji input[type=radio]+label {
            padding: 5px
        }
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label svg {
        overflow: visible;
        transition: all .3s;
        max-height: 100%
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .mouth {
        fill: #727272;
        transition: fill .3s, stroke .3s
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .head-outline {
        stroke: #727272;
        stroke-width: 2px
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .head {
        fill: #fff
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth {
        fill: #fff
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth-group {
        stroke: #727272;
        stroke-width: 1px
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth-bg {
        fill: rgba(0, 0, 0, .1)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .mouth {
        fill: #e51c23
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .head-outline {
        stroke: #e51c23
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .mouth {
        fill: #ff5722
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .head-outline {
        stroke: #ff5722
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .mouth {
        fill: #ffc107
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .head-outline {
        stroke: #ffc107
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .mouth {
        fill: #8bc34a
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .head-outline {
        stroke: #8bc34a
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .mouth {
        fill: #259b24
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .head-outline {
        stroke: #259b24
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .big-mouth-group,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .big-mouth-group {
        stroke: #259b24
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .big-mouth-bg,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .big-mouth-bg {
        fill: rgba(37, 155, 36, .25)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth-group,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .mouth {
        -webkit-transition: -webkit-transform .3s;
        transition: -webkit-transform .3s;
        transition: transform .3s;
        transition: transform .3s, -webkit-transform .3s;
        -webkit-transform-origin: center;
        transform-origin: center
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(3px);
        -moz-transform: translateY(3px);
        transform: translateY(3px)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .eyebrows:nth-of-type(2),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .eyebrows:nth-of-type(2) {
        -webkit-transform: translateY(3px);
        -moz-transform: translateY(3px);
        transform: translateY(3px)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(10px) rotate(15deg);
        -moz-transform: translateY(10px) rotate(15deg);
        transform: translateY(10px) rotate(15deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyebrows:nth-of-type(2),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyebrows:nth-of-type(2) {
        -webkit-transform: translateY(10px) rotate(-15deg);
        -moz-transform: translateY(10px) rotate(-15deg);
        transform: translateY(10px) rotate(-15deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyes {
        -webkit-transform: translateY(5px);
        -moz-transform: translateY(5px);
        transform: translateY(5px)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(-5px);
        -moz-transform: translateY(-5px);
        transform: translateY(-5px)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .mouth {
        -webkit-transform: rotate(-10deg);
        transform: rotate(-10deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(-5px) rotate(-5deg);
        -moz-transform: translateY(-5px) rotate(-5deg);
        transform: translateY(-5px) rotate(-5deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .eyebrows:nth-of-type(2),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .eyebrows:nth-of-type(2) {
        -webkit-transform: translateY(-5px) rotate(5deg);
        -moz-transform: translateY(-5px) rotate(5deg);
        transform: translateY(-5px) rotate(5deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .mouth {
        -webkit-transform: scale(1.1);
        transform: scale(1.1)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-love .big-mouth-group,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-love .big-mouth-group {
        -webkit-transform: scale(1.1);
        transform: scale(1.1)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(-5px) rotate(-5deg);
        -moz-transform: translateY(-5px) rotate(-5deg);
        transform: translateY(-5px) rotate(-5deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .eyebrows:nth-of-type(2),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .eyebrows:nth-of-type(2) {
        -webkit-transform: translateY(-5px) rotate(5deg);
        -moz-transform: translateY(-5px) rotate(5deg);
        transform: translateY(-5px) rotate(5deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .big-mouth-group,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .big-mouth-group {
        -webkit-transform: scale(1.1);
        transform: scale(1.1)
    }

    .zindawork-survey-content .rating-group.emoji .rating-choice input[type=radio]:checked+label,
    .zindawork-survey-content .rating-group.emoji .rating-choice input[type=radio]:hover+label {
        box-shadow: none;
        background: 0 0 !important;
        overflow: visible
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label svg {
        pointer-events: none
    }

    @media screen and (-ms-high-contrast:active),
    (-ms-high-contrast:none) {
        .zindawork-survey-content .rating-group.emoji input[type=radio]+label svg {
            max-height: 56px !important
        }
    }

    .zindawork-survey-content .required-mark {
        color: #607d8b;
        font-weight: 700;
        font-weight: 600;
        font-size: .8em;
        margin-left: 3px;
        vertical-align: top
    }

    @-webkit-keyframes successBounce {
        0% {
            -webkit-transform: scale(0) rotate(270deg) rotateX(90deg);
            transform: scale(0) rotate(270deg) rotateX(90deg);
            opacity: 0
        }

        100% {
            -webkit-transform: scale(1) rotate(0) rotateX(0);
            transform: scale(1) rotate(0) rotateX(0);
            opacity: 1
        }
    }

    @keyframes successBounce {
        0% {
            -webkit-transform: scale(0) rotate(270deg) rotateX(90deg);
            transform: scale(0) rotate(270deg) rotateX(90deg);
            opacity: 0
        }

        100% {
            -webkit-transform: scale(1) rotate(0) rotateX(0);
            transform: scale(1) rotate(0) rotateX(0);
            opacity: 1
        }
    }

    @media screen and (device-aspect-ratio:2/3) {

        .zindawork-survey-content input[type=color],
        .zindawork-survey-content input[type=date],
        .zindawork-survey-content input[type=datetime-local],
        .zindawork-survey-content input[type=datetime],
        .zindawork-survey-content input[type=email],
        .zindawork-survey-content input[type=month],
        .zindawork-survey-content input[type=number],
        .zindawork-survey-content input[type=password],
        .zindawork-survey-content input[type=search],
        .zindawork-survey-content input[type=tel],
        .zindawork-survey-content input[type=text],
        .zindawork-survey-content input[type=time],
        .zindawork-survey-content input[type=url],
        .zindawork-survey-content input[type=week],
        .zindawork-survey-content textarea {
            font-size: 16px
        }
    }

    @media screen and (device-aspect-ratio:40/71) {

        .zindawork-survey-content input[type=color],
        .zindawork-survey-content input[type=date],
        .zindawork-survey-content input[type=datetime-local],
        .zindawork-survey-content input[type=datetime],
        .zindawork-survey-content input[type=email],
        .zindawork-survey-content input[type=month],
        .zindawork-survey-content input[type=number],
        .zindawork-survey-content input[type=password],
        .zindawork-survey-content input[type=search],
        .zindawork-survey-content input[type=tel],
        .zindawork-survey-content input[type=text],
        .zindawork-survey-content input[type=time],
        .zindawork-survey-content input[type=url],
        .zindawork-survey-content input[type=week],
        .zindawork-survey-content textarea {
            font-size: 16px
        }
    }

    @media screen and (device-aspect-ratio:375/667) {

        .zindawork-survey-content input[type=color],
        .zindawork-survey-content input[type=date],
        .zindawork-survey-content input[type=datetime-local],
        .zindawork-survey-content input[type=datetime],
        .zindawork-survey-content input[type=email],
        .zindawork-survey-content input[type=month],
        .zindawork-survey-content input[type=number],
        .zindawork-survey-content input[type=password],
        .zindawork-survey-content input[type=search],
        .zindawork-survey-content input[type=tel],
        .zindawork-survey-content input[type=text],
        .zindawork-survey-content input[type=time],
        .zindawork-survey-content input[type=url],
        .zindawork-survey-content input[type=week],
        .zindawork-survey-content textarea {
            font-size: 16px
        }
    }

    @media screen and (device-aspect-ratio:9/16) {

        .zindawork-survey-content input[type=color],
        .zindawork-survey-content input[type=date],
        .zindawork-survey-content input[type=datetime-local],
        .zindawork-survey-content input[type=datetime],
        .zindawork-survey-content input[type=email],
        .zindawork-survey-content input[type=month],
        .zindawork-survey-content input[type=number],
        .zindawork-survey-content input[type=password],
        .zindawork-survey-content input[type=search],
        .zindawork-survey-content input[type=tel],
        .zindawork-survey-content input[type=text],
        .zindawork-survey-content input[type=time],
        .zindawork-survey-content input[type=url],
        .zindawork-survey-content input[type=week],
        .zindawork-survey-content textarea {
            font-size: 16px
        }
    }

    .zindawork-survey-content.round input[type=color],
    .zindawork-survey-content.round input[type=date],
    .zindawork-survey-content.round input[type=datetime-local],
    .zindawork-survey-content.round input[type=datetime],
    .zindawork-survey-content.round input[type=email],
    .zindawork-survey-content.round input[type=month],
    .zindawork-survey-content.round input[type=number],
    .zindawork-survey-content.round input[type=password],
    .zindawork-survey-content.round input[type=search],
    .zindawork-survey-content.round input[type=tel],
    .zindawork-survey-content.round input[type=text],
    .zindawork-survey-content.round input[type=time],
    .zindawork-survey-content.round input[type=url],
    .zindawork-survey-content.round input[type=week],
    .zindawork-survey-content.round select,
    .zindawork-survey-content.round textarea {
        -webkit-border-radius: 20px;
        border-radius: 20px
    }

    .zindawork-survey-content.round .category-wrapper.button input[type=radio]+label,
    .zindawork-survey-content.round .radio-wrapper.button input[type=radio]+label {
        border-radius: 20px
    }

    .zindawork-survey-content.round input,
    .zindawork-survey-content.round textarea {
        padding-left: 16px;
        padding-right: 16px
    }

    .zindawork-survey-content.round textarea {
        resize: vertical
    }

    .zindawork-survey-content.round::-webkit-resizer {
        display: none
    }

    .zindawork-survey-content.round .zindawork-survey-output .btn-next,
    .zindawork-survey-content.round .zindawork-survey-output .btn-primary,
    .zindawork-survey-content.round .zindawork-survey-output .btn.btn-previous,
    .zindawork-survey-content.round .zindawork-survey-output .btn.btn-submit {
        border-radius: 24px;
        box-shadow: none
    }

    .zindawork-survey-content.round .section-screenshot {
        border-radius: 12px
    }

    .zindawork-survey-content .input-wrap {
        position: relative
    }

    @-webkit-keyframes CircularProgress-keyframes-circular-rotate {
        0% {
            transform-origin: 50% 50%
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .survey-material-white,
    .zindawork-survey-output.survey-material-white {
        font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif
    }

    .survey-material-white #surveyHead {
        background-color: #fff;
        color: #727272
    }

    .zindawork-survey-output.survey-material-white .block-title:after {
        background: #b3e5fc
    }

    .zindawork-survey-output.survey-material-white input[type=color],
    .zindawork-survey-output.survey-material-white input[type=date],
    .zindawork-survey-output.survey-material-white input[type=datetime-local],
    .zindawork-survey-output.survey-material-white input[type=datetime],
    .zindawork-survey-output.survey-material-white input[type=email],
    .zindawork-survey-output.survey-material-white input[type=month],
    .zindawork-survey-output.survey-material-white input[type=number],
    .zindawork-survey-output.survey-material-white input[type=password],
    .zindawork-survey-output.survey-material-white input[type=search],
    .zindawork-survey-output.survey-material-white input[type=tel],
    .zindawork-survey-output.survey-material-white input[type=text],
    .zindawork-survey-output.survey-material-white input[type=time],
    .zindawork-survey-output.survey-material-white input[type=url],
    .zindawork-survey-output.survey-material-white input[type=week],
    .zindawork-survey-output.survey-material-white textarea {
        background-color: #fff
    }

    .zindawork-survey-output.survey-material-white input[type=color]:focus,
    .zindawork-survey-output.survey-material-white input[type=date]:focus,
    .zindawork-survey-output.survey-material-white input[type=datetime-local]:focus,
    .zindawork-survey-output.survey-material-white input[type=datetime]:focus,
    .zindawork-survey-output.survey-material-white input[type=email]:focus,
    .zindawork-survey-output.survey-material-white input[type=month]:focus,
    .zindawork-survey-output.survey-material-white input[type=number]:focus,
    .zindawork-survey-output.survey-material-white input[type=password]:focus,
    .zindawork-survey-output.survey-material-white input[type=search]:focus,
    .zindawork-survey-output.survey-material-white input[type=tel]:focus,
    .zindawork-survey-output.survey-material-white input[type=text]:focus,
    .zindawork-survey-output.survey-material-white input[type=time]:focus,
    .zindawork-survey-output.survey-material-white input[type=url]:focus,
    .zindawork-survey-output.survey-material-white input[type=week]:focus,
    .zindawork-survey-output.survey-material-white textarea:focus {
        border-color: #03a9f4;
        -webkit-box-shadow: 0 0 0 1px #03a9f4;
        -moz-box-shadow: 0 0 0 1px #03a9f4;
        box-shadow: 0 0 0 1px #03a9f4
    }

    .zindawork-survey-output.survey-material-white .btn-next,
    .zindawork-survey-output.survey-material-white .btn-primary {
        background-color: #03a9f4;
        border: 1px solid #03a9f4;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .btn-next:active,
    .zindawork-survey-output.survey-material-white .btn-next:focus,
    .zindawork-survey-output.survey-material-white .btn-next:hover,
    .zindawork-survey-output.survey-material-white .btn-next[disabled],
    .zindawork-survey-output.survey-material-white .btn-primary:active,
    .zindawork-survey-output.survey-material-white .btn-primary:focus,
    .zindawork-survey-output.survey-material-white .btn-primary:hover,
    .zindawork-survey-output.survey-material-white .btn-primary[disabled] {
        background-color: #0288d1;
        border-color: #0288d1;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .btn-submit:before {
        background: #0288d1;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white input[type=radio]+label:after {
        color: #fff;
        background: #03a9f4
    }

    .zindawork-survey-output.survey-material-white input[type=radio]+label:active:after,
    .zindawork-survey-output.survey-material-white input[type=radio]+label:focus:after {
        box-shadow: 0 0 0 20px #b3e5fc;
        box-shadow: 0 0 0 20px rgba(179, 229, 252, .5)
    }

    .zindawork-survey-output.survey-material-white input[type=radio]:checked+label:before {
        border-color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]+label,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]+label {
        color: #727272;
        background-color: #fff
    }

    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]+label:hover,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]+label:hover {
        border-color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]+label:active,
    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]+label:focus,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]+label:active,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]+label:focus {
        border-color: #03a9f4;
        color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]:checked+label,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]:checked+label {
        border-color: #03a9f4;
        background-color: #03a9f4;
        color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]+label:before {
        background-color: #fff
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]+label .is-context-icon {
        color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]+label:active .is-context-icon,
    .zindawork-survey-output.survey-material-white input[type=checkbox]+label:focus .is-context-icon {
        box-shadow: 0 0 0 20px #b3e5fc;
        box-shadow: 0 0 0 20px rgba(179, 229, 252, .5);
        background: rgba(179, 229, 252, .5)
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]:checked+label:before {
        border-color: #03a9f4;
        background-color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]:checked+label .is-context-icon {
        color: #fff
    }

    .zindawork-survey-output.survey-material-white a.tooltip {
        color: #fff;
        background: #b6b6b6
    }

    .zindawork-survey-output.survey-material-white a.tooltip:hover {
        border-color: #616161;
        background: #616161;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white a.tooltip div {
        background: #000;
        background: rgba(0, 0, 0, .7);
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .rating-group label {
        background: #fff;
        color: #727272
    }

    .zindawork-survey-output.survey-material-white .rating-group input[type=radio]:hover+label {
        background: #03a9f4;
        border-color: #03a9f4;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .rating-group input[type=radio]:checked+label {
        background: #03a9f4;
        border-color: #03a9f4;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .required-mark {
        color: #607d8b
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn {
        background-color: #2b81e5 !important;
        background-color: #2b81e5 !important;
        border-color: #2b81e5 !important;
        border-color: #2b81e5 !important;
        color: #fff !important;
        font-weight: 700 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .srv-title {
        color: #31313b !important
    }

    .zindawork-survey-content .zindawork-survey-output[data-key='12345zindawork'] {
        color: #333 !important;
        font-size: 16px !important;
        font-family: 'Open Sans' !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .block-title {
        font-family: 'Open Sans' !important;
        color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=text] {
        border-color: #c7c7c7 !important;
        color: #31313b !important;
        font-family: 'Open Sans' !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=text]:focus {
        border-color: #2b81e5 !important;
        box-shadow: 0 0 0 1px #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=email] {
        border-color: #c7c7c7 !important;
        color: #31313b !important;
        font-family: 'Open Sans' !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=email]:focus {
        border-color: #2b81e5 !important;
        box-shadow: 0 0 0 1px #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=tel] {
        border-color: #c7c7c7 !important;
        color: #31313b !important;
        font-family: 'Open Sans' !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=tel]:focus {
        border-color: #2b81e5 !important;
        box-shadow: 0 0 0 1px #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=date] {
        border-color: #c7c7c7 !important;
        color: #31313b !important;
        font-family: 'Open Sans' !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=date]:focus {
        border-color: #2b81e5 !important;
        box-shadow: 0 0 0 1px #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=number] {
        border-color: #c7c7c7 !important;
        color: #31313b !important;
        font-family: 'Open Sans' !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=number]:focus {
        border-color: #2b81e5 !important;
        box-shadow: 0 0 0 1px #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] textarea {
        border-color: #c7c7c7 !important;
        color: #31313b !important;
        font-family: 'Open Sans' !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] textarea:focus {
        border-color: #2b81e5 !important;
        box-shadow: 0 0 0 1px #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]+label:after:hover {
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]:checked+label:after {
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]+label:hover i {
        color: #e0e3e6 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]:checked+label i {
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]:checked+label {
        color: #000 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]+label {
        color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]+label:after:hover {
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]:checked+label:after {
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]+label:hover i {
        color: #e0e3e6 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]:checked+label i {
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]:checked+label {
        color: #000 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]+label {
        color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]+label:before {
        border-color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]:checked+label:before {
        border-color: #2679d8 !important;
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]+label:before {
        border-color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]:checked+label:before {
        border-color: #2679d8 !important;
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn.btn-next:hover {
        background-color: #1e5aa0 !important;
        border-color: #1e5aa0 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn.btn-next {
        background-color: #247ade !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn.btn-primary:hover {
        background-color: #1e5aa0 !important;
        border-color: #1e5aa0 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn.btn-primary {
        background-color: #247ade !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .radio-wrapper.button input[type=radio]+label {
        border-color: #ccc !important;
        color: #7b7b7b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .radio-wrapper.button input[type=radio]+label:hover {
        border-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .radio-wrapper.button input[type=radio]:checked+label {
        border-color: #1e5aa0 !important;
        background-color: #2b81e5 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .category-wrapper.button input[type=radio]+label {
        border-color: #ccc !important;
        color: #7b7b7b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .category-wrapper.button input[type=radio]+label:hover {
        border-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .category-wrapper.button input[type=radio]:checked+label {
        border-color: #1e5aa0 !important;
        background-color: #2b81e5 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn-previous {
        color: #31313b !important;
        background-color: #f7f7fc !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .rating-group input[type=radio]+label:hover {
        border-color: #2b81e5 !important;
        background-color: #2b81e5 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .rating-group input[type=radio]:checked+label {
        border-color: #1e5aa0 !important;
        background-color: #2b81e5 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .section-title {
        color: #31313b !important
    }

    .zindawork-survey-content input,
    .zindawork-survey-content textarea {
        padding-left: 18px !important
    }

    .zindawork-survey-content input::placeholder,
    .zindawork-survey-content textarea::placeholder {
        color: #31313b;
        font-weight: 300;
        font-size: 14px;
        letter-spacing: 1px;
        font-family: 'Open Sans'
    }

    .zindawork-survey-content textarea {
        padding-top: 14px;
        min-height: 100px
    }

    .zindawork-survey-content .btn-next,
    .zindawork-survey-content .btn-previous,
    .zindawork-survey-content .btn-submit {
        border-radius: 50px
    }

    body,
        {
        margin: 0;
        padding: 0;
        overflow: hidden
    }

    .zindawork-survey-content {
        font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        outline: 0;
        position: relative;
        margin: 0;
        overflow: hidden;
        text-transform: initial;
        letter-spacing: normal;
        text-align: left
    }

    .zindawork-survey-content *,
    .zindawork-survey-content :after,
    .zindawork-survey-content :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-tap-highlight-color: transparent;
        -webkit-tap-highlight-color: transparent;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%
    }

    .zindawork-survey-content a,
    .zindawork-survey-content button,
    .zindawork-survey-content div,
    .zindawork-survey-content form,
    .zindawork-survey-content input,
    .zindawork-survey-content label,
    .zindawork-survey-content span {
        border: 0;
        outline: 0;
        font-size: 100%;
        line-height: initial;
        vertical-align: baseline;
        background: 0 0;
        margin: 0;
        padding: 0;
        float: none;
        width: auto
    }

    .zindawork-survey-content a,
    .zindawork-survey-content button,
    .zindawork-survey-content input+label {
        cursor: pointer
    }

    .zindawork-survey-content .mopicon {
        display: inline-block;
        vertical-align: middle
    }

    .zindawork-survey-content .mopicon svg {
        user-select: none;
        width: 1em;
        height: 1em;
        display: inline-block;
        flex-shrink: 0;
        font-size: inherit
    }

    .zindawork-survey-content #surveyHead {
        padding: 20px 35px 20px 20px;
        margin-bottom: 20px
    }

    .zindawork-survey-content .control-group {
        padding: 20px;
        position: relative
    }

    .zindawork-survey-content .form-actions {
        position: relative;
        padding: 20px 20px 40px;
        margin: 0
    }

    .zindawork-survey-content a:active,
    .zindawork-survey-content a:focus,
    .zindawork-survey-content a:hover {
        outline: 0
    }

    .zindawork-survey-content button,
    .zindawork-survey-content input,
    .zindawork-survey-content select,
    .zindawork-survey-content textarea {
        margin: 0;
        font-size: inherit;
        vertical-align: middle
    }

    .zindawork-survey-content button,
    .zindawork-survey-content input {
        line-height: normal
    }

    .zindawork-survey-content button::-moz-focus-inner,
    .zindawork-survey-content input::-moz-focus-inner {
        padding: 0;
        border: 0
    }

    .zindawork-survey-content button,
    .zindawork-survey-content input[type=reset],
    .zindawork-survey-content input[type=submit],
    .zindawork-survey-content input[type=button] {
        cursor: pointer;
        -webkit-appearance: button
    }

    .zindawork-survey-content button,
    .zindawork-survey-content input[type=button],
    .zindawork-survey-content input[type=checkbox],
    .zindawork-survey-content input[type=radio],
    .zindawork-survey-content input[type=reset],
    .zindawork-survey-content input[type=submit],
    .zindawork-survey-content select {
        cursor: pointer
    }

    .zindawork-survey-content input[type=search]::-webkit-search-cancel-button,
    .zindawork-survey-content input[type=search]::-webkit-search-decoration {
        -webkit-appearance: none
    }

    .zindawork-survey-content textarea {
        overflow: auto;
        vertical-align: top
    }

    #surveyBody,
    .zindawork-survey-content {
        font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        font-size: 14px;
        line-height: 1.4;
        color: #212121;
        border-radius: 0;
        position: relative
    }

    .zindawork-survey-content .zindawork-survey-output {
        background: #fff
    }

    .zindawork-survey-content .is-modal {
        font-size: 14px
    }

    #surveyBody {
        margin: 0;
        width: 100%
    }

    .zindawork-survey-content a {
        color: #08c;
        text-decoration: none;
        cursor: pointer
    }

    .zindawork-survey-content a:focus,
    .zindawork-survey-content a:hover {
        color: #005580;
        text-decoration: underline
    }

    .zindawork-survey-content a.btn:focus,
    .zindawork-survey-content a.btn:hover {
        text-decoration: none
    }

    .zindawork-survey-content h1,
    .zindawork-survey-content h2,
    .zindawork-survey-content h3,
    .zindawork-survey-content h4,
    .zindawork-survey-content h5,
    .zindawork-survey-content h6 {
        margin: 10px 0 20px;
        font-family: inherit;
        color: inherit;
        text-rendering: optimizelegibility;
        font-weight: 700;
        font-weight: 600
    }

    .zindawork-survey-content #surveyHead h1 {
        margin: 0
    }

    .zindawork-survey-content h1 {
        font-size: 1.6em;
        line-height: 1.4
    }

    .zindawork-survey-content h2 {
        font-size: 1.4em
    }

    .zindawork-survey-content h3 {
        font-size: 1.2em
    }

    .zindawork-survey-content h4 {
        font-size: 1.1em
    }

    .zindawork-survey-content h5 {
        font-size: 1em
    }

    .zindawork-survey-content h6 {
        font-size: .8em
    }

    .zindawork-survey-content .main-title {
        margin-bottom: 0
    }

    .zindawork-survey-content .section-title {
        margin-top: 0
    }

    .zindawork-survey-content .section-title:empty {
        margin: 0
    }

    .zindawork-survey-content .section.absolute .block-title {
        display: none
    }

    .zindawork-survey-content .section-screenshot {
        color: #727272;
        cursor: pointer;
        position: relative;
        display: inline-block;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .12), 0 1px 5px 0 rgba(0, 0, 0, .2);
        padding: 2px 8px;
        border: 2px solid transparent;
        -webkit-transition: border linear .2s, box-shadow linear .2s;
        transition: border linear .2s, box-shadow linear .2s;
        z-index: 5;
        border-radius: 3px;
        line-height: 1
    }

    .zindawork-survey-content .section-screenshot .mopicon-camera {
        font-size: 28px
    }

    .zindawork-survey-content .section-screenshot:hover {
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12), 0 2px 4px -1px rgba(0, 0, 0, .2)
    }

    .zindawork-survey-content .section-screenshot.tooltip:hover {
        background-color: transparent;
        color: #616161
    }

    .zindawork-survey-content .section-screenshot.tooltip>span.tooltip {
        position: absolute;
        left: 0;
        top: 0;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 6px;
        min-width: 0;
        background: #000;
        background: rgba(0, 0, 0, .7);
        border: 0;
        color: #fff;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        opacity: 0;
        visibility: hidden;
        transition: all .3s;
        min-width: 200px;
        -webkit-transform: translateY(-100%);
        -ms-transform: translateY(-100%);
        transform: translateY(-100%)
    }

    .zindawork-survey-content .section-screenshot.tooltip:hover>span.tooltip {
        visibility: visible;
        opacity: 1
    }

    .zindawork-survey-content .section-screenshot .detect-capture {
        display: none;
        position: absolute;
        bottom: -8px;
        right: -8px;
        width: 16px;
        height: 16px;
        line-height: 16px;
        font-size: 9px;
        color: #fff;
        background: #4caf50;
        border-radius: 100%;
        text-align: center
    }

    .zindawork-survey-content .section.absolute {
        padding: 0 20px 10px 20px;
        margin-top: -20px
    }

    .zindawork-survey-content .section.absolute .block-title {
        display: none
    }

    .zindawork-survey-content .section-screenshot {
        color: #727272;
        cursor: pointer
    }

    .zindawork-survey-content .section-screenshot.tooltip {
        display: inline-block;
        height: auto;
        background-color: transparent;
        position: relative;
        border-radius: 0;
        cursor: pointer;
        color: #727272
    }

    .zindawork-survey-content .section-screenshot.tooltip:hover {
        background-color: transparent;
        color: #616161
    }

    .zindawork-survey-content .section-screenshot.tooltip:hover>span,
    .zindawork-survey-content .section-screenshot.tooltip>span {
        top: 26px;
        left: 40px
    }

    .zindawork-survey-content fieldset {
        padding: 0;
        margin: 0;
        border: 0
    }

    .zindawork-survey-content div.block-title,
    .zindawork-survey-content legend {
        display: block;
        width: 100%;
        padding: 0;
        margin: 0 0 8px;
        font-size: inherit;
        line-height: inherit;
        color: inherit;
        border: 0;
        position: relative
    }

    .zindawork-survey-content .block-title {
        font-size: 1em;
        font-weight: 400
    }

    .zindawork-survey-content .block-title label {
        display: inline
    }

    .zindawork-survey-content .block-title:after {
        content: '';
        display: none;
        width: 30px;
        height: 2px;
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: #b3e5fc
    }

    .zindawork-survey-content .block-title.has-tooltip,
    .zindawork-survey-content .control-group.has-tooltip .block-title {
        position: relative;
        padding-right: 40px
    }

    .zindawork-survey-content div[id^=user_input] {
        margin-top: 10px
    }

    .zindawork-survey-content label {
        display: block;
        margin-bottom: 5px
    }

    .zindawork-survey-content select,
    .zindawork-survey-content textarea {
        display: inline-block;
        height: 40px;
        padding: 6px 6px;
        margin: 0;
        font-size: 1em;
        font-family: inherit;
        line-height: inherit;
        color: inherit;
        vertical-align: middle;
        -webkit-border-radius: 2px;
        border-radius: 3px;
        -webkit-appearance: none
    }

    .zindawork-survey-content input,
    .zindawork-survey-content textarea {
        width: 100%;
        min-width: 0
    }

    .zindawork-survey-content textarea {
        height: auto;
        min-height: 70px
    }

    .zindawork-survey-content textarea {
        background-color: #fff;
        border: 1px solid #ddd;
        -webkit-transition: border linear .2s, box-shadow linear .2s;
        -moz-transition: border linear .2s, box-shadow linear .2s;
        -o-transition: border linear .2s, box-shadow linear .2s;
        transition: border linear .2s, box-shadow linear .2s
    }

    .zindawork-survey-content textarea:focus {
        border-color: #03a9f4;
        outline: 0;
        -webkit-box-shadow: 0 0 0 1px #0288d1;
        -moz-box-shadow: 0 0 0 1px #0288d1;
        box-shadow: 0 0 0 1px #03a9f4
    }

    .zindawork-survey-content input[type=checkbox],
    .zindawork-survey-content input[type=radio] {
        margin: 4px 0 0;
        line-height: normal
    }

    .zindawork-survey-content input::-moz-placeholder,
    .zindawork-survey-content textarea::-moz-placeholder {
        color: #b6b6b6;
        font-weight: 700;
        font-weight: 600;
        font-size: 90%
    }

    .zindawork-survey-content input::-webkit-input-placeholder,
    .zindawork-survey-content textarea::-webkit-input-placeholder {
        color: #b6b6b6;
        font-weight: 700;
        font-weight: 600;
        font-size: 90%
    }

    .zindawork-survey-content .email-wrapper div,
    .zindawork-survey-content .name-wrapper div,
    .zindawork-survey-content .title-wrapper div {
        -webkit-box-flex: 1;
        -webkit-flex: 1 0 auto;
        -ms-flex: 1 0 auto;
        flex: 1 0 auto;
        margin-right: 5px
    }

    .zindawork-survey-content input[type=checkbox],
    .zindawork-survey-content input[type=radio] {
        height: 0;
        width: 0 !important;
        min-width: 0 !important;
        position: absolute;
        left: -999px
    }

    .zindawork-survey-content input[type=checkbox]+label,
    .zindawork-survey-content input[type=radio]+label {
        position: relative;
        color: #727272;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 5px 0 5px 50px;
        -webkit-transition: all .3s ease;
        transition: all .3s ease;
        display: block
    }

    .zindawork-survey-content input[type=checkbox]:checked+label,
    .zindawork-survey-content input[type=radio]:checked+label {
        color: #212121
    }

    .zindawork-survey-content input[type=radio]+label:before {
        content: '';
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        margin-top: 2.5px;
        margin-left: 5px;
        height: 24px;
        width: 24px;
        border-radius: 100%;
        border: 1px solid #b6b6b6;
        visibility: visible;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease
    }

    .zindawork-survey-content input[type=radio]+label:after {
        display: block;
        content: '';
        height: 18px;
        width: 18px;
        color: #fff;
        visibility: visible;
        position: absolute;
        top: 0;
        left: 0;
        margin-top: 5.5px;
        margin-left: 8px;
        background: #03a9f4;
        border-radius: 100%;
        opacity: 0;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease
    }

    .zindawork-survey-content input[type=radio]+label:hover:after {
        -webkit-transform: scale(.45);
        -ms-transform: scale(.45);
        transform: scale(.45);
        opacity: 1
    }

    .zindawork-survey-content input[type=radio]+label:active:after,
    .zindawork-survey-content input[type=radio]+label:focus:after {
        -webkit-transform: scale(.65);
        -ms-transform: scale(.65);
        transform: scale(.65);
        box-shadow: 0 0 0 20px #b3e5fc;
        box-shadow: 0 0 0 20px rgba(179, 229, 252, .5);
        opacity: 1
    }

    .zindawork-survey-content input[type=radio]:checked+label:before {
        border-color: #03a9f4
    }

    .zindawork-survey-content input[type=radio]:checked+label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1)
    }

    .zindawork-survey-content .button-container {
        display: block;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-flow: row wrap;
        flex-flow: row wrap;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden
    }

    .zindawork-survey-content .category-wrapper.button,
    .zindawork-survey-content .radio-wrapper.button {
        display: inline-block;
        -webkit-box-flex: 0 1 auto;
        -webkit-flex: 0 1 auto;
        -ms-flex: 0 1 auto;
        flex: 0 1 auto;
        min-width: 20%;
        background: 0 0;
        line-height: inherit
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label {
        padding: 8px 16px;
        border: 1px solid #ddd;
        border-radius: 3px;
        margin-right: 5px;
        color: #727272;
        background-color: #fff;
        overflow: hidden;
        font-weight: 400;
        font-weight: 600;
        text-align: center
    }

    @media screen and (max-width:992px) {

        .zindawork-survey-content .category-wrapper.button,
        .zindawork-survey-content .radio-wrapper.button {
            min-width: 33%
        }
    }

    .zindawork-survey-content .is-modal [class*='-wrapper'].button {
        min-width: 33%
    }

    @media screen and (max-width:400px) {
        .zindawork-survey-content .button-container:not(.thumbs-container) {
            display: block;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-flow: column wrap;
            flex-flow: column wrap
        }

        .zindawork-survey-content .category-wrapper.button,
        .zindawork-survey-content .radio-wrapper.button {
            min-width: 100%
        }

        .zindawork-survey-content .category-wrapper.button input[type=radio]+label,
        .zindawork-survey-content .radio-wrapper.button input[type=radio]+label {
            text-align: left;
            padding-left: 24px
        }
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:hover,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:hover {
        border-color: #03a9f4;
        -webkit-transform: scale(1.1);
        -ms-transform: scale(1.1);
        transform: scale(1.1);
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12), 0 2px 4px -1px rgba(0, 0, 0, .2);
        -webkit-transform: translateY(-1px);
        -ms-transform: translateY(-1px);
        transform: translateY(-1px);
        z-index: 2
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:active,
    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:focus,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:active,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:focus {
        border-color: #03a9f4;
        color: #03a9f4;
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
        z-index: 2
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]:checked+label,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:checked+label {
        border-color: #03a9f4;
        color: #212121;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:after,
    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:before,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:after,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:before {
        content: none
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label .is-context-icon {
        color: #fff;
        width: auto;
        height: auto;
        background: 0 0;
        border: 0;
        font-size: 14px;
        top: 50%;
        left: 0;
        margin-top: -8.5px;
        margin-left: 0;
        -webkit-transform: translate(-200%, 0);
        -ms-transform: translate(-200%, 0);
        transform: translate(-200%, 0);
        font-weight: 400
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]+label:hover .is-context-icon,
    .zindawork-survey-content .category-wrapper.button input[type=radio]:active+label .is-context-icon,
    .zindawork-survey-content .category-wrapper.button input[type=radio]:checked+label .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]+label:hover .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:active+label .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:checked+label .is-context-icon {
        color: inherit
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]:checked+label .is-context-icon,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:checked+label .is-context-icon {
        -webkit-transform: translate(5px, 0);
        -ms-transform: translate(5px, 0);
        transform: translate(5px, 0)
    }

    .zindawork-survey-content .category-wrapper.button input[type=radio]:checked:active+label,
    .zindawork-survey-content .radio-wrapper.button input[type=radio]:checked:active+label {
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9)
    }

    .zindawork-survey-content .rating-group.has-legend {
        padding-bottom: 20px
    }

    .zindawork-survey-content .btn,
    .zindawork-survey-content button {
        display: inline-block;
        margin: 0;
        padding: 12px 24px;
        font-size: 1em;
        line-height: 1;
        text-align: center;
        font-weight: 400;
        font-weight: 400;
        vertical-align: middle;
        position: relative;
        background-color: #fff;
        border: 1px solid #ddd;
        color: #202021;
        outline: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        -webkit-transition: all .3s cubic-bezier(.25, .8, .25, 1);
        transition: all .3s cubic-bezier(.25, .8, .25, 1);
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .12), 0 1px 5px 0 rgba(0, 0, 0, .2);
        z-index: 2;
        font-family: inherit;
        letter-spacing: normal;
        text-transform: none;
        width: auto;
        max-width: none;
        min-width: none;
        max-height: none;
        min-height: none
    }

    .zindawork-survey-content .btn:focus,
    .zindawork-survey-content .btn:hover,
    .zindawork-survey-content .btn[disabled] {
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12), 0 2px 4px -1px rgba(0, 0, 0, .2);
        -webkit-transform: translateY(-1px);
        -ms-transform: translateY(-1px);
        transform: translateY(-1px)
    }

    .zindawork-survey-content .btn:active {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
    }

    .zindawork-survey-content .btn-previous .is-context-icon {
        display: inline-block;
        margin-right: 10px;
        color: inherit;
        -webkit-transition: -webkit-transform .3s;
        transition: transform .3s
    }

    .zindawork-survey-content .btn-previous:active .is-context-icon,
    .zindawork-survey-content .btn-previous:focus .is-context-icon,
    .zindawork-survey-content .btn-previous:hover .is-context-icon {
        -webkit-transform: translate(-3px, 0);
        -ms-transform: translate(-3px, 0);
        transform: translate(-3px, 0)
    }

    .zindawork-survey-content .btn-next,
    .zindawork-survey-content .btn-primary {
        font-weight: 600;
        background-color: #03a9f4;
        border: 1px solid #03a9f4;
        color: #fff
    }

    .zindawork-survey-content .btn-next:active,
    .zindawork-survey-content .btn-next:focus,
    .zindawork-survey-content .btn-next:hover,
    .zindawork-survey-content .btn-next[disabled],
    .zindawork-survey-content .btn-primary:active,
    .zindawork-survey-content .btn-primary:focus,
    .zindawork-survey-content .btn-primary:hover,
    .zindawork-survey-content .btn-primary[disabled] {
        background-color: #0288d1;
        border-color: #0288d1;
        color: #fff
    }

    .zindawork-survey-content .btn-next .is-context-icon {
        display: inline-block;
        margin-left: 10px;
        -webkit-transition: -webkit-transform .3s;
        transition: transform .3s
    }

    .zindawork-survey-content .btn-submit .is-context-icon {
        display: inline-block;
        margin-left: 10px;
        font-size: 12px;
        vertical-align: middle;
        -webkit-transition: -webkit-transform .3s;
        transition: transform .3s
    }

    @-webkit-keyframes scaleInOut {
        30% {
            -webkit-transform: scale(.2);
            transform: scale(.2)
        }

        100% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @keyframes scaleInOut {
        30% {
            -webkit-transform: scale(.2);
            transform: scale(.2)
        }

        100% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @-webkit-keyframes scaleOutIn {
        30% {
            -webkit-transform-origin: right center;
            transform-origin: right center;
            -webkit-transform: scale(2);
            transform: scale(2)
        }

        100% {
            -webkit-transform-origin: right center;
            transform-origin: right center;
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @keyframes scaleOutIn {
        30% {
            -webkit-transform-origin: right center;
            transform-origin: right center;
            -webkit-transform: scale(2);
            transform: scale(2)
        }

        100% {
            -webkit-transform-origin: right center;
            transform-origin: right center;
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @-webkit-keyframes mopicon-spin {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg)
        }
    }

    @keyframes mopicon-spin {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }

        100% {
            -webkit-transform: rotate(359deg);
            transform: rotate(359deg)
        }
    }

    @media screen and (max-width:360px) {
        .zindawork-survey-content .form-actions {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-flow: column wrap;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-flow: column wrap;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center
        }

        .zindawork-survey-content .btn-next,
        .zindawork-survey-content .btn-submit {
            -webkit-box-ordinal-group: 1;
            -ms-flex-order: 1;
            order: 1
        }

        .zindawork-survey-content .btn-previous {
            -webkit-box-ordinal-group: 2;
            -ms-flex-order: 2;
            order: 2;
            margin-top: 5px
        }

        .zindawork-survey-content .form-actions .btn {
            box-shadow: none;
            border-radius: 0;
            width: 100%
        }
    }

    .zindawork-survey-content .btn[disabled] {
        opacity: .4
    }

    .zindawork-survey-content .btn-block {
        display: block;
        width: 100%;
        padding-right: 0;
        padding-left: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    .zindawork-survey-content .btn-block+.btn-block {
        margin-top: 5px
    }

    .zindawork-survey-content input[type=button].btn-block,
    .zindawork-survey-content input[type=reset].btn-block,
    .zindawork-survey-content input[type=submit].btn-block {
        width: 100%
    }

    .zindawork-survey-content button.btn::-moz-focus-inner,
    .zindawork-survey-content input[type=submit].btn::-moz-focus-inner {
        padding: 0;
        border: 0
    }

    @keyframes errorFadeIn {
        from {
            -webkit-transform: translate(-10px, 0);
            transform: translate(-10px, 0);
            opacity: 0
        }

        to {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
            opacity: 1
        }
    }

    @keyframes errorFadeIn {
        from {
            -webkit-transform: translate(-10px, 0);
            -moz-transform: translate(-10px, 0);
            transform: translate(-10px, 0);
            opacity: 0
        }

        to {
            -webkit-transform: translate(0, 0);
            -moz-transform: translate(0, 0);
            transform: translate(0, 0);
            opacity: 1
        }
    }

    .zindawork-survey-content .pull-right {
        float: right
    }

    .zindawork-survey-content .pull-left {
        float: left
    }

    .zindawork-survey-content .show {
        display: block
    }

    .zindawork-survey-content a.tooltip {
        display: block;
        height: 20px;
        line-height: 20px;
        width: 20px;
        position: relative;
        margin: 0;
        color: #fff;
        background: #b6b6b6;
        font-size: 12px;
        text-align: center;
        border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        -webkit-transition: all .15s linear;
        -moz-transition: all .15s linear;
        -o-transition: all .15s linear;
        transition: all .15s ease;
        position: absolute;
        top: 0;
        right: 0
    }

    .zindawork-survey-content a.tooltip:hover {
        border-color: #616161;
        background: #616161;
        color: #fff
    }

    .zindawork-survey-content a.tooltip:hover {
        text-decoration: none
    }

    .zindawork-survey-content a.tooltip div {
        position: absolute;
        right: 0;
        top: 0;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 6px;
        min-width: 0;
        background: #000;
        background: rgba(0, 0, 0, .7);
        border: 0;
        color: #fff;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        opacity: 0;
        visibility: hidden;
        transition: all .3s;
        min-width: 200px;
        -webkit-transform: translateY(-100%);
        -ms-transform: translateY(-100%);
        transform: translateY(-100%)
    }

    .zindawork-survey-content a.tooltip:hover div {
        visibility: visible;
        opacity: 1
    }

    .zindawork-survey-content a.tooltip span {
        display: block;
        background: 0 0 !important
    }

    .zindawork-survey-content .rating-group {
        display: block
    }

    .zindawork-survey-content .rating-group:after {
        content: '';
        display: table;
        clear: both
    }

    .zindawork-survey-content .rating-group.emoji {
        display: table;
        border-spacing: 0;
        table-layout: fixed;
        width: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden
    }

    .zindawork-survey-content .rating-group .choice-row {
        display: table-row
    }

    .zindawork-survey-content .rating-group input[type=radio] {
        height: 0;
        width: 0;
        margin: 0;
        position: absolute;
        left: -9999px
    }

    .zindawork-survey-content .rating-group input[type=radio]+label:after,
    .zindawork-survey-content .rating-group input[type=radio]+label:before {
        content: none
    }

    .zindawork-survey-content .rating-group label {
        display: block;
        vertical-align: middle;
        text-align: center;
        cursor: pointer;
        border: 1px solid #ddd;
        background: #fff;
        color: #727272;
        font-size: 1em;
        font-style: normal !important;
        font-weight: 400;
        font-weight: 600;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease
    }

    .zindawork-survey-content .rating-choice {
        display: table-cell
    }

    .zindawork-survey-content .rating-choice:last-of-type {
        padding-right: 0
    }

    .zindawork-survey-content .rating-group input[type=radio]+label {
        display: block;
        width: 100%;
        height: auto;
        padding: 10px 0;
        margin: 0;
        border-left: 0;
        position: relative;
        overflow: visible
    }

    .zindawork-survey-content .rating-group input[type=radio]+label:hover,
    .zindawork-survey-content .rating-group input[type=radio]:checked+label {
        border-left: 1px solid
    }

    .zindawork-survey-content .rating-group .choice-row>div:first-of-type input[type=radio]+label {
        border-left: 1px solid #ddd
    }

    .zindawork-survey-content .rating-group input[type=radio]:hover+label {
        background: #03a9f4;
        border-color: #03a9f4;
        color: #fff;
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, .14), 0 1px 10px 0 rgba(0, 0, 0, .12), 0 2px 4px -1px rgba(0, 0, 0, .2);
        -webkit-transform: translateY(-1px) scale(1.05);
        -ms-transform: translateY(-1px) scale(1.05);
        transform: translateY(-1px) scale(1.05);
        z-index: 2
    }

    .zindawork-survey-content .rating-group input[type=radio]:active+label,
    .zindawork-survey-content .rating-group input[type=radio]:focus+label {
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
        z-index: 3
    }

    .zindawork-survey-content .rating-group input[type=radio]:checked+label {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        background: #03a9f4;
        border-color: #03a9f4;
        color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
    }

    .zindawork-survey-content .rating-group input[type=radio]:checked:active+label {
        -webkit-transform: scale(.9);
        -ms-transform: scale(.9);
        transform: scale(.9)
    }

    .zindawork-survey-content .rating-group.emoji {
        max-width: 380px
    }

    .zindawork-survey-content .control-group .rating-group.emoji input[type=radio]+label {
        border: 0 !important;
        padding: 10px;
        background: #fff !important
    }

    .zindawork-survey-content .rating-group.emoji.show-labels input[type=radio]+label:before {
        content: attr(data-label);
        position: absolute;
        left: 50%;
        right: auto;
        top: auto;
        bottom: 0;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 6px;
        width: auto !important;
        background: #616161;
        background: rgba(97, 97, 97, .9);
        border: 0;
        color: #fff;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        opacity: 0;
        visibility: hidden;
        -webkit-transform: translate(-50%, 100%);
        -ms-transform: translate(-50%, 100%);
        transform: translate(-50%, 100%);
        text-align: center;
        display: block;
        margin: 0 !important;
        height: auto;
        visibility: visible;
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease
    }

    .zindawork-survey-content .rating-group.emoji.show-labels input[type=radio]:checked+label:before,
    .zindawork-survey-content .rating-group.emoji.show-labels input[type=radio]:hover+label:before {
        visibility: visible;
        opacity: 1
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label:before {
        -webkit-transform: translate(-50%, 75%);
        -ms-transform: translate(-50%, 75%);
        transform: translate(-50%, 75%)
    }

    @media screen and (max-width:400px) {
        .zindawork-survey-content .rating-group.emoji input[type=radio]+label {
            padding: 5px 10px
        }
    }

    @media screen and (max-width:350px) {
        .zindawork-survey-content .rating-group.emoji input[type=radio]+label {
            padding: 5px
        }
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label svg {
        overflow: visible;
        transition: all .3s;
        max-height: 100%
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .mouth {
        fill: #727272;
        transition: fill .3s, stroke .3s
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .head-outline {
        stroke: #727272;
        stroke-width: 2px
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .head {
        fill: #fff
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth {
        fill: #fff
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth-group {
        stroke: #727272;
        stroke-width: 1px
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth-bg {
        fill: rgba(0, 0, 0, .1)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .mouth {
        fill: #e51c23
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .head-outline {
        stroke: #e51c23
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .mouth {
        fill: #ff5722
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .head-outline {
        stroke: #ff5722
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .mouth {
        fill: #ffc107
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .head-outline {
        stroke: #ffc107
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .mouth {
        fill: #8bc34a
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .head-outline {
        stroke: #8bc34a
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .mouth {
        fill: #259b24
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .head-outline,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .head-outline {
        stroke: #259b24
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .big-mouth-group,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .big-mouth-group {
        stroke: #259b24
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .big-mouth-bg,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .big-mouth-bg {
        fill: rgba(37, 155, 36, .25)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .big-mouth-group,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .eyebrows,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]+label .mouth {
        -webkit-transition: -webkit-transform .3s;
        transition: -webkit-transform .3s;
        transition: transform .3s;
        transition: transform .3s, -webkit-transform .3s;
        -webkit-transform-origin: center;
        transform-origin: center
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(3px);
        -moz-transform: translateY(3px);
        transform: translateY(3px)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-angry .eyebrows:nth-of-type(2),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-angry .eyebrows:nth-of-type(2) {
        -webkit-transform: translateY(3px);
        -moz-transform: translateY(3px);
        transform: translateY(3px)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(10px) rotate(15deg);
        -moz-transform: translateY(10px) rotate(15deg);
        transform: translateY(10px) rotate(15deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyebrows:nth-of-type(2),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyebrows:nth-of-type(2) {
        -webkit-transform: translateY(10px) rotate(-15deg);
        -moz-transform: translateY(10px) rotate(-15deg);
        transform: translateY(10px) rotate(-15deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-sad .eyes,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-sad .eyes {
        -webkit-transform: translateY(5px);
        -moz-transform: translateY(5px);
        transform: translateY(5px)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(-5px);
        -moz-transform: translateY(-5px);
        transform: translateY(-5px)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-neutral .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-neutral .mouth {
        -webkit-transform: rotate(-10deg);
        transform: rotate(-10deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(-5px) rotate(-5deg);
        -moz-transform: translateY(-5px) rotate(-5deg);
        transform: translateY(-5px) rotate(-5deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .eyebrows:nth-of-type(2),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .eyebrows:nth-of-type(2) {
        -webkit-transform: translateY(-5px) rotate(5deg);
        -moz-transform: translateY(-5px) rotate(5deg);
        transform: translateY(-5px) rotate(5deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-happy .mouth,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-happy .mouth {
        -webkit-transform: scale(1.1);
        transform: scale(1.1)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-love .big-mouth-group,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-love .big-mouth-group {
        -webkit-transform: scale(1.1);
        transform: scale(1.1)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .eyebrows:nth-of-type(1),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .eyebrows:nth-of-type(1) {
        -webkit-transform: translateY(-5px) rotate(-5deg);
        -moz-transform: translateY(-5px) rotate(-5deg);
        transform: translateY(-5px) rotate(-5deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .eyebrows:nth-of-type(2),
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .eyebrows:nth-of-type(2) {
        -webkit-transform: translateY(-5px) rotate(5deg);
        -moz-transform: translateY(-5px) rotate(5deg);
        transform: translateY(-5px) rotate(5deg)
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]:checked+label.emoji-extra-happy .big-mouth-group,
    .zindawork-survey-content .rating-group.emoji input[type=radio]:hover+label.emoji-extra-happy .big-mouth-group {
        -webkit-transform: scale(1.1);
        transform: scale(1.1)
    }

    .zindawork-survey-content .rating-group.emoji .rating-choice input[type=radio]:checked+label,
    .zindawork-survey-content .rating-group.emoji .rating-choice input[type=radio]:hover+label {
        box-shadow: none;
        background: 0 0 !important;
        overflow: visible
    }

    .zindawork-survey-content .rating-group.emoji input[type=radio]+label svg {
        pointer-events: none
    }

    @media screen and (-ms-high-contrast:active),
    (-ms-high-contrast:none) {
        .zindawork-survey-content .rating-group.emoji input[type=radio]+label svg {
            max-height: 56px !important
        }
    }

    .zindawork-survey-content .required-mark {
        color: #607d8b;
        font-weight: 700;
        font-weight: 600;
        font-size: .8em;
        margin-left: 3px;
        vertical-align: top
    }

    @-webkit-keyframes successBounce {
        0% {
            -webkit-transform: scale(0) rotate(270deg) rotateX(90deg);
            transform: scale(0) rotate(270deg) rotateX(90deg);
            opacity: 0
        }

        100% {
            -webkit-transform: scale(1) rotate(0) rotateX(0);
            transform: scale(1) rotate(0) rotateX(0);
            opacity: 1
        }
    }

    @keyframes successBounce {
        0% {
            -webkit-transform: scale(0) rotate(270deg) rotateX(90deg);
            transform: scale(0) rotate(270deg) rotateX(90deg);
            opacity: 0
        }

        100% {
            -webkit-transform: scale(1) rotate(0) rotateX(0);
            transform: scale(1) rotate(0) rotateX(0);
            opacity: 1
        }
    }

    @media screen and (device-aspect-ratio:2/3) {

        .zindawork-survey-content input[type=color],
        .zindawork-survey-content input[type=date],
        .zindawork-survey-content input[type=datetime-local],
        .zindawork-survey-content input[type=datetime],
        .zindawork-survey-content input[type=email],
        .zindawork-survey-content input[type=month],
        .zindawork-survey-content input[type=number],
        .zindawork-survey-content input[type=password],
        .zindawork-survey-content input[type=search],
        .zindawork-survey-content input[type=tel],
        .zindawork-survey-content input[type=text],
        .zindawork-survey-content input[type=time],
        .zindawork-survey-content input[type=url],
        .zindawork-survey-content input[type=week],
        .zindawork-survey-content textarea {
            font-size: 16px
        }
    }

    @media screen and (device-aspect-ratio:40/71) {

        .zindawork-survey-content input[type=color],
        .zindawork-survey-content input[type=date],
        .zindawork-survey-content input[type=datetime-local],
        .zindawork-survey-content input[type=datetime],
        .zindawork-survey-content input[type=email],
        .zindawork-survey-content input[type=month],
        .zindawork-survey-content input[type=number],
        .zindawork-survey-content input[type=password],
        .zindawork-survey-content input[type=search],
        .zindawork-survey-content input[type=tel],
        .zindawork-survey-content input[type=text],
        .zindawork-survey-content input[type=time],
        .zindawork-survey-content input[type=url],
        .zindawork-survey-content input[type=week],
        .zindawork-survey-content textarea {
            font-size: 16px
        }
    }

    @media screen and (device-aspect-ratio:375/667) {

        .zindawork-survey-content input[type=color],
        .zindawork-survey-content input[type=date],
        .zindawork-survey-content input[type=datetime-local],
        .zindawork-survey-content input[type=datetime],
        .zindawork-survey-content input[type=email],
        .zindawork-survey-content input[type=month],
        .zindawork-survey-content input[type=number],
        .zindawork-survey-content input[type=password],
        .zindawork-survey-content input[type=search],
        .zindawork-survey-content input[type=tel],
        .zindawork-survey-content input[type=text],
        .zindawork-survey-content input[type=time],
        .zindawork-survey-content input[type=url],
        .zindawork-survey-content input[type=week],
        .zindawork-survey-content textarea {
            font-size: 16px
        }
    }

    @media screen and (device-aspect-ratio:9/16) {
        .zindawork-survey-content textarea {
            font-size: 16px
        }
    }

    .zindawork-survey-content.round textarea {
        -webkit-border-radius: 20px;
        border-radius: 20px
    }

    .zindawork-survey-content.round .category-wrapper.button input[type=radio]+label,
    .zindawork-survey-content.round .radio-wrapper.button input[type=radio]+label {
        border-radius: 20px
    }

    .zindawork-survey-content.round input,
    .zindawork-survey-content.round textarea {
        padding-left: 16px;
        padding-right: 16px
    }

    .zindawork-survey-content.round textarea {
        resize: vertical
    }

    .zindawork-survey-content.round::-webkit-resizer {
        display: none
    }

    .zindawork-survey-content.round .zindawork-survey-output .btn-next,
    .zindawork-survey-content.round .zindawork-survey-output .btn-primary,
    .zindawork-survey-content.round .zindawork-survey-output .btn.btn-previous,
    .zindawork-survey-content.round .zindawork-survey-output .btn.btn-submit {
        border-radius: 24px;
        box-shadow: none
    }

    .zindawork-survey-content.round .section-screenshot {
        border-radius: 12px
    }

    .zindawork-survey-content .input-wrap {
        position: relative
    }

    @-webkit-keyframes CircularProgress-keyframes-circular-rotate {
        0% {
            transform-origin: 50% 50%
        }

        100% {
            transform: rotate(360deg)
        }
    }

    .survey-material-white,
    .zindawork-survey-output.survey-material-white {
        font-family: 'Open Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif
    }

    .survey-material-white #surveyHead {
        background-color: #fff;
        color: #727272
    }

    .zindawork-survey-output.survey-material-white .block-title:after {
        background: #b3e5fc
    }

    .zindawork-survey-output.survey-material-white textarea {
        background-color: #fff
    }

    .zindawork-survey-output.survey-material-white textarea:focus {
        border-color: #03a9f4;
        -webkit-box-shadow: 0 0 0 1px #03a9f4;
        -moz-box-shadow: 0 0 0 1px #03a9f4;
        box-shadow: 0 0 0 1px #03a9f4
    }

    .zindawork-survey-output.survey-material-white .btn-next,
    .zindawork-survey-output.survey-material-white .btn-primary {
        background-color: #03a9f4;
        border: 1px solid #03a9f4;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .btn-primary:active,
    .zindawork-survey-output.survey-material-white .btn-primary:focus,
    .zindawork-survey-output.survey-material-white .btn-primary:hover,
    .zindawork-survey-output.survey-material-white .btn-primary[disabled] {
        background-color: #0288d1;
        border-color: #0288d1;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .btn-submit:before {
        background: #0288d1;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white input[type=radio]+label:after {
        color: #fff;
        background: #03a9f4
    }

    .zindawork-survey-output.survey-material-white input[type=radio]+label:active:after,
    .zindawork-survey-output.survey-material-white input[type=radio]+label:focus:after {
        box-shadow: 0 0 0 20px #b3e5fc;
        box-shadow: 0 0 0 20px rgba(179, 229, 252, .5)
    }

    .zindawork-survey-output.survey-material-white input[type=radio]:checked+label:before {
        border-color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]+label,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]+label {
        color: #727272;
        background-color: #fff
    }

    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]+label:hover,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]+label:hover {
        border-color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]+label:active,
    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]+label:focus,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]+label:active,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]+label:focus {
        border-color: #03a9f4;
        color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white .category-wrapper.button input[type=radio]:checked+label,
    .zindawork-survey-output.survey-material-white .radio-wrapper.button input[type=radio]:checked+label {
        border-color: #03a9f4;
        background-color: #03a9f4;
        color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]+label:before {
        background-color: #fff
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]+label .is-context-icon {
        color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]+label:active .is-context-icon,
    .zindawork-survey-output.survey-material-white input[type=checkbox]+label:focus .is-context-icon {
        box-shadow: 0 0 0 20px #b3e5fc;
        box-shadow: 0 0 0 20px rgba(179, 229, 252, .5);
        background: rgba(179, 229, 252, .5)
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]:checked+label:before {
        border-color: #03a9f4;
        background-color: #03a9f4
    }

    .zindawork-survey-output.survey-material-white input[type=checkbox]:checked+label .is-context-icon {
        color: #fff
    }

    .zindawork-survey-output.survey-material-white a.tooltip {
        color: #fff;
        background: #b6b6b6
    }

    .zindawork-survey-output.survey-material-white a.tooltip:hover {
        border-color: #616161;
        background: #616161;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white a.tooltip div {
        background: #000;
        background: rgba(0, 0, 0, .7);
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .rating-group label {
        background: #fff;
        color: #727272
    }

    .zindawork-survey-output.survey-material-white .rating-group input[type=radio]:hover+label {
        background: #03a9f4;
        border-color: #03a9f4;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .rating-group input[type=radio]:checked+label {
        background: #03a9f4;
        border-color: #03a9f4;
        color: #fff
    }

    .zindawork-survey-output.survey-material-white .required-mark {
        color: #607d8b
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn {
        background-color: #2b81e5 !important;
        background-color: #2b81e5 !important;
        border-color: #2b81e5 !important;
        border-color: #2b81e5 !important;
        color: #fff !important;
        font-weight: 700 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .srv-title {
        color: #31313b !important
    }

    .zindawork-survey-content .zindawork-survey-output[data-key='12345zindawork'] {
        color: #333 !important;
        font-size: 16px !important;
        font-family: 'Open Sans' !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .block-title {
        font-family: 'Open Sans' !important;
        color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] textarea {
        border-color: #c7c7c7 !important;
        color: #31313b !important;
        font-family: 'Open Sans' !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] textarea:focus {
        border-color: #2b81e5 !important;
        box-shadow: 0 0 0 1px #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]+label:after:hover {
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]:checked+label:after {
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]+label:hover i {
        color: #e0e3e6 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]:checked+label i {
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]:checked+label {
        color: #000 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]+label {
        color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]+label:after:hover {
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]:checked+label:after {
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]+label:hover i {
        color: #e0e3e6 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]:checked+label i {
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]:checked+label {
        color: #000 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]+label {
        color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]+label:before {
        border-color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=radio]:checked+label:before {
        border-color: #2679d8 !important;
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]+label:before {
        border-color: #31313b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] input[type=checkbox]:checked+label:before {
        border-color: #2679d8 !important;
        background-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn.btn-next:hover {
        background-color: #1e5aa0 !important;
        border-color: #1e5aa0 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn.btn-next {
        background-color: #247ade !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn.btn-primary:hover {
        background-color: #1e5aa0 !important;
        border-color: #1e5aa0 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn.btn-primary {
        background-color: #247ade !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .radio-wrapper.button input[type=radio]+label {
        border-color: #ccc !important;
        color: #7b7b7b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .radio-wrapper.button input[type=radio]+label:hover {
        border-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .radio-wrapper.button input[type=radio]:checked+label {
        border-color: #1e5aa0 !important;
        background-color: #2b81e5 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .category-wrapper.button input[type=radio]+label {
        border-color: #ccc !important;
        color: #7b7b7b !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .category-wrapper.button input[type=radio]+label:hover {
        border-color: #2b81e5 !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .category-wrapper.button input[type=radio]:checked+label {
        border-color: #1e5aa0 !important;
        background-color: #2b81e5 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .btn-previous {
        color: #31313b !important;
        background-color: #f7f7fc !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .rating-group input[type=radio]+label:hover {
        border-color: #2b81e5 !important;
        background-color: #2b81e5 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .rating-group input[type=radio]:checked+label {
        border-color: #1e5aa0 !important;
        background-color: #2b81e5 !important;
        color: #fff !important
    }

    .zindawork-survey-content [data-key='12345zindawork'] .section-title {
        color: #31313b !important
    }

    .zindawork-survey-content input,
    .zindawork-survey-content textarea {
        padding-left: 18px !important
    }

    .zindawork-survey-content input::placeholder,
    .zindawork-survey-content textarea::placeholder {
        color: #31313b;
        font-weight: 300;
        font-size: 14px;
        letter-spacing: 1px;
        font-family: 'Open Sans'
    }

    .zindawork-survey-content textarea {
        padding-top: 14px;
        min-height: 100px
    }

    .zindawork-survey-content .btn-next,
    .zindawork-survey-content .btn-previous,
    .zindawork-survey-content .btn-submit {
        border-radius: 50px
    }

    @media screen and (min-width:768px) {
        .container {
            margin: auto;
            width: 768px
        }
    }

    @media screen and (min-width:768px) {
        .containerfeedback {
            margin: auto;
            width: 768px;
        }
    }

</style>

<form method="POST" method="post" enctype="multipart/form-data" action="{{route('feed.create')}}">
    @csrf

    @if (count($errors) > 0)
    <div class="alert alert-success">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="containerfeedback">
        <div id="surveyBody" style="overflow: hidden;">
            <div class="zindawork-survey-content notranslate  round " tabindex="-1">
                <div class="zindawork-survey-output survey-material-white  is-modal  on-page-1 "
                    data-mop-page-url="https://zindawork.com/" style="position: relative;">
                    <div id="surveyHead" class="">
                        <div id="surveyTitle" class="srv-title main-title">
                            <h1>Your feedback</h1>
                        </div>
                    </div>
                    <div id="page1" style="display: block;">
                        <div class="control-group question rating -group rating-group-1  " data-index="0"
                            id="rating-1123" style="display: block;">
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="fn"> Name:</label>


                                    @if(Auth::guard('company')->check())
                                    <input type="hidden" name="company_id"
                                        value="{{Auth::guard('company')->user()->id}}">
                                    <input type="text" hidden name="company" value="company">
                                    <input type="text" readonly class="form-control p-2" name="name"
                                        value="{{ Auth::guard('company')->user()->name }}">
                                    <label for="fn"> Email:</label>
                                    <input type="text" readonly class="form-control p-2" name="email"
                                        value="{{ Auth::guard('company')->user()->email }}">
                                    @endif
                                    @if(Auth::guard('web')->check())
                                    <input type="hidden" name="company_id" value="{{Auth::guard('web')->user()->id}}">
                                    <input type="text" hidden name="company" value="user">
                                    <input type="text" readonly class="form-control p-2" name="name"
                                        value="{{ Auth::guard('web')->user()->name }}">
                                    <label for="fn"> Email:</label>
                                    <input type="text" readonly class="form-control p-2" name="email"
                                        value="{{ Auth::guard('web')->user()->email }}">
                                    @endif


                                </div>


                                <fieldset>
                                    <legend class="block-title" id="block-title-rating-1123">
                                        <br>
                                        <label>What is your opinion?</label>
                                        <span aria-label="This question is required" class="required-mark">*</span>
                                    </legend>
                                    <div class="rating-group rating-group emoji emoji-group rating show-labels">
                                        <div class="choice-row">
                                            <div class="rating-choice">
                                                <input type="radio" name="emoji" value="Angry" id="rating-1123_0"
                                                    aria-label="Angry">
                                                <label for="rating-1123_0" class="emoji-angry" data-label="Angry"
                                                    name="level"><span><svg viewBox="0 0 80 80">
                                                            <g>
                                                                <g>
                                                                    <linearGradient gradientUnits="userSpaceOnUse"
                                                                        x1="40" x2="40" y2="80">
                                                                        <stop offset="0" stop-color="#FC9C76"></stop>
                                                                        <stop offset=".1389" stop-color="#FDAC7A">
                                                                        </stop>
                                                                        <stop offset=".49" stop-color="#FFEB89"></stop>
                                                                        <stop offset="1" stop-color="#FFEB89"></stop>
                                                                    </linearGradient>
                                                                    <circle class="head" cx="40" cy="40" r="40">
                                                                    </circle>
                                                                </g>
                                                                <path class="head-outline" d="M40,1.6c21,0,38,17,38,38s-17,38-38,38s-38-17-38-38S19,1.6,40,1.6 M40-0.4
c-22.1,0-40,17.9-40,40s17.9,40,40,40s40-17.9,40-40S62.1-0.4,40-0.4L40-0.4z"></path>
                                                                <g>
                                                                    <circle class="eyes" cx="62.1" cy="41.4" r="3.9">
                                                                    </circle>
                                                                    <circle class="eyes" cx="17.9" cy="41.4" r="3.9">
                                                                    </circle>
                                                                </g>
                                                                <g>
                                                                    <path class="eyebrows"
                                                                        d="M55.4 38.5c-.1 0-.2 0-.4-.1-.6-.2-1-.9-.8-1.5 1.2-3.7 4.2-5.5 6.6-5.9 2.2-.4 4.3.2 5.4 1.6.4.5.3 1.3-.2 1.7-.5.4-1.3.3-1.7-.2-.6-.7-1.8-1-3.2-.8-1.7.3-3.9 1.6-4.7 4.3 0 .5-.5.9-1 .9z">
                                                                    </path>
                                                                    <path class="eyebrows"
                                                                        d="M24.7 38.5c-.5 0-1-.3-1.1-.8-.9-2.7-3-4-4.7-4.3-1.3-.3-2.6 0-3.2.8-.4.5-1.2.6-1.7.2-.5-.4-.6-1.2-.2-1.7 1.2-1.4 3.2-2 5.4-1.6 2.4.5 5.4 2.3 6.6 5.9.2.6-.1 1.3-.8 1.5-.1-.1-.2 0-.3 0z">
                                                                    </path>
                                                                </g>
                                                                <path class="mouth"
                                                                    d="M33.5 57.5c-.1 0-.3 0-.4-.1-.6-.2-.9-.9-.7-1.5.9-2.7 3.7-4.4 7-4.4 3.4 0 6.2 1.7 7.2 4.4.2.6-.1 1.3-.7 1.5-.6.2-1.3-.1-1.5-.7-.8-2.1-3.2-2.8-4.9-2.8-1.8 0-4.1.7-4.8 2.8-.2.5-.7.8-1.2.8z">
                                                                </path>
                                                            </g>
                                                        </svg></span></label></div>
                                            <div class="rating-choice"><input type="radio" name="emoji" value="Sad"
                                                    id="rating-1123_1" aria-label="Sad" name="level"><label
                                                    for="rating-1123_1" class="emoji-sad" data-label="Sad"><span><svg
                                                            viewBox="0 0 80 80">
                                                            <g>
                                                                <g>
                                                                    <circle class="head" cx="40" cy="40" r="40">
                                                                    </circle>
                                                                </g>
                                                                <path class="head-outline" d="M40,1.6c21,0,38,17,38,38s-17,38-38,38s-38-17-38-38S19,1.6,40,1.6 M40-0.4
 c-22.1,0-40,17.9-40,40s17.9,40,40,40s40-17.9,40-40S62.1-0.4,40-0.4L40-0.4z"></path>
                                                                <g>
                                                                    <path class="eyebrows"
                                                                        d="M19.7 32.9c-2.1 0-3.9-1-4.9-2.7-.3-.6-.1-1.3.4-1.6.6-.3 1.3-.1 1.6.4.9 1.5 2.6 1.7 3.8 1.4 1.2-.3 2.7-1.2 2.9-2.9.1-.7.6-1.1 1.3-1.1.7.1 1.1.7 1.1 1.3-.2 2.5-2.1 4.5-4.8 5-.4.1-.9.2-1.4.2z">
                                                                    </path>
                                                                    <path class="eyebrows"
                                                                        d="M60.4 32.9c-.5 0-1-.1-1.5-.2-2.7-.6-4.5-2.6-4.8-5-.1-.7.4-1.2 1.1-1.3.7-.1 1.2.4 1.3 1.1.2 1.7 1.7 2.7 2.9 2.9 1.2.3 2.9.1 3.8-1.4.3-.6 1.1-.8 1.6-.4.6.3.8 1.1.4 1.6-.9 1.7-2.7 2.7-4.8 2.7z">
                                                                    </path>
                                                                </g>
                                                                <path class="mouth"
                                                                    d="M34 58c-.1 0-.3 0-.4-.1-.6-.2-.9-.9-.7-1.5.9-2.7 3.7-4.4 7.1-4.4 3.4 0 6.2 1.7 7.1 4.4.2.6-.1 1.3-.7 1.5-.6.2-1.3-.3-1.5-.9-.8-2.1-3.1-3-4.9-3-1.8 0-4.1 1-4.8 3-.2.5-.7 1-1.2 1z">
                                                                </path>
                                                                <g>
                                                                    <path class="eyes"
                                                                        d="M62.2 44c-3.4 0-6.2-1.3-7.1-4-.2-.6.1-1.1.7-1.3.6-.2 1.3 0 1.5.6.8 2.1 3.1 2.7 4.9 2.7 1.8 0 4.1-.5 4.8-2.6.2-.6.9-.8 1.5-.6.6.2 1 .5.7 1.2-.8 2.6-3.6 4-7 4z">
                                                                    </path>
                                                                    <path class="eyes"
                                                                        d="M17.9 44c-3.4 0-6.2-1.3-7.1-4-.2-.6.1-1.1.7-1.3.6-.2 1.3 0 1.5.6.8 2.1 3.1 2.7 4.9 2.7 1.8 0 4.1-.5 4.8-2.6.2-.6.9-.8 1.5-.6.6.2.9.5.7 1.2-.8 2.6-3.6 4-7 4z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg></span></label></div>
                                            <div class="rating-choice"><input type="radio" name="emoji" value="Neutral"
                                                    id="rating-1123_2" aria-label="Neutral" name="level"><label
                                                    for="rating-1123_2" class="emoji-neutral"
                                                    data-label="Neutral"><span><svg viewBox="0 0 80 80">
                                                            <g>
                                                                <g>
                                                                    <circle class="head" cx="40" cy="40" r="40">
                                                                    </circle>
                                                                </g>
                                                                <path class="head-outline" d="M40,1.6c21,0,38,17,38,38s-17,38-38,38s-38-17-38-38S19,1.6,40,1.6 M40-0.4
 c-22.1,0-40,17.9-40,40s17.9,40,40,40s40-17.9,40-40S62.1-0.4,40-0.4L40-0.4z"></path>
                                                                <g>
                                                                    <circle class="eyes" cx="62.1" cy="41.4" r="3.9">
                                                                    </circle>
                                                                    <circle class="eyes" cx="17.9" cy="41.4" r="3.9">
                                                                    </circle>
                                                                </g>
                                                                <g>
                                                                    <path class="eyebrows"
                                                                        d="M23.2 37h-9.6c-.7 0-1.2-.8-1.2-1.5S13 34 13.7 34h9.6c.7 0 1.2.8 1.2 1.5s-.6 1.5-1.3 1.5z">
                                                                    </path>
                                                                    <path class="eyebrows"
                                                                        d="M66.3 37h-9.6c-.7 0-1.2-.8-1.2-1.5S56 34 56.7 34h9.6c.7 0 1.2.8 1.2 1.5S67 37 66.3 37z">
                                                                    </path>
                                                                </g>
                                                                <g>
                                                                    <path class="mouth"
                                                                        d="M48.4 58H31.6c-.7 0-1.2-.3-1.2-1s.5-1 1.2-1h16.8c.7 0 1.2.3 1.2 1s-.6 1-1.2 1z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg></span></label></div>
                                            <div class="rating-choice"><input type="radio" name="emoji" value="Happy"
                                                    id="rating-1123_3" aria-label="Happy" name="level"><label
                                                    for="rating-1123_3" class="emoji-happy"
                                                    data-label="Happy"><span><svg viewBox="0 0 80 80">
                                                            <g>
                                                                <g>
                                                                    <circle class="head" cx="40" cy="40" r="40">
                                                                    </circle>
                                                                </g>
                                                                <path class="head-outline" d="M40,1.6c21,0,38,17,38,38s-17,38-38,38s-38-17-38-38S19,1.6,40,1.6 M40-0.4
 c-22.1,0-40,17.9-40,40s17.9,40,40,40s40-17.9,40-40S62.1-0.4,40-0.4L40-0.4z"></path>
                                                                <path class="mouth"
                                                                    d="M39.5 66h-.2c-7.8 0-14.7-4.2-18.4-10.8-.3-.6-.1-1.4.4-1.8.6-.3 1.3-.7 1.6-.1 3.3 5.8 9.4 8.7 16.3 8.7h.1c7 0 13.2-2.9 16.6-8.8.3-.6 1.1-.5 1.6-.2.6.3.8 1.5.4 2.1C54.4 61.7 47.4 66 39.5 66z">
                                                                </path>
                                                                <g>
                                                                    <path class="eyebrows"
                                                                        d="M9.8 30c-.7 0-1.2-.1-1.2-.7.1-2.8 2.3-5.1 5.5-6.1s6.3-.1 8.1 2.1c.4.5.3 1.3-.2 1.7-.5.4-1.3.3-1.7-.2-1.3-1.7-3.8-1.7-5.4-1.2-1.7.5-3.7 1.5-3.8 3.7-.1.7-.6.7-1.3.7z">
                                                                    </path>
                                                                    <path class="eyebrows"
                                                                        d="M69.1 30c-.6 0-1.2 0-1.2-.7-.1-2.2-2.1-3.4-3.8-3.9-1.7-.5-4.1-.4-5.4 1.3-.4.5-1.2.7-1.7.3-.5-.4-.6-1.1-.2-1.6 1.7-2.2 4.9-3 8.1-2 3.2 1 5.4 3 5.5 5.9-.1.6-.6.7-1.3.7z">
                                                                    </path>
                                                                </g>
                                                                <g>
                                                                    <circle class="eyes" cx="62.1" cy="37.8" r="3.9">
                                                                    </circle>
                                                                    <circle class="eyes" cx="17.9" cy="37.8" r="3.9">
                                                                    </circle>
                                                                </g>
                                                            </g>
                                                        </svg></span></label></div>
                                            <div class="rating-choice"><input type="radio" name="emoji"
                                                    value="Very happy" id="rating-1123_4" aria-label="Very happy"
                                                    name="level"><label for="rating-1123_4" class="emoji-extra-happy"
                                                    data-label="Very happy"><span><svg viewBox="0 0 80 80">
                                                            <g>
                                                                <g>
                                                                    <circle class="head" cx="40" cy="40" r="40">
                                                                    </circle>
                                                                </g>
                                                                <path class="head-outline" d="M40,1.6c21,0,38,17,38,38s-17,38-38,38s-38-17-38-38S19,1.6,40,1.6 M40-0.4
 c-22.1,0-40,17.9-40,40s17.9,40,40,40s40-17.9,40-40S62.1-0.4,40-0.4L40-0.4z"></path>
                                                                <g>
                                                                    <path class="eyebrows"
                                                                        d="M10.4 30s-.1 0 0 0c-.7 0-1.2-.1-1.2-.7.1-2.8 2.3-5.1 5.5-6.1s6.3-.1 8.1 2.1c.4.5.3 1.3-.2 1.7-.5.4-1.3.3-1.7-.2-1.3-1.7-3.8-1.7-5.4-1.2-1.7.5-3.7 1.5-3.8 3.7-.2.7-.7.7-1.3.7z">
                                                                    </path>
                                                                    <path class="eyebrows"
                                                                        d="M69.6 30c-.6 0-1.2 0-1.2-.7-.1-2.2-2.1-3.4-3.8-3.9-1.7-.5-4.1-.4-5.4 1.3-.4.5-1.2.7-1.7.3-.5-.4-.6-1.1-.2-1.6 1.7-2.2 4.9-3 8.1-2 3.2 1 5.4 3 5.5 5.9 0 .6-.6.7-1.3.7.1 0 0 0 0 0z">
                                                                    </path>
                                                                </g>
                                                                <g class="big-mouth-group">
                                                                    <defs>
                                                                        <path id="big-mouth-inner"
                                                                            d="M22.9 51h33.3c0 17-16.6 17.3-16.6 17.3S22.9 68 22.9 51z">
                                                                        </path>
                                                                    </defs>
                                                                    <path
                                                                        d="M22.9 51h33.3c0 17-16.6 17.3-16.6 17.3S22.9 68 22.9 51z"
                                                                        overflow="visible" fill="#FFA67F"
                                                                        class="big-mouth-bg">
                                                                    </path>
                                                                    <clipPath>
                                                                        <path
                                                                            d="M22.9 51h33.3c0 17-16.6 17.3-16.6 17.3S22.9 68 22.9 51z"
                                                                            overflow="visible"></path>
                                                                    </clipPath>
                                                                    <path class="big-mouth" d="M22.9 51h33.3v3.6H23z">
                                                                    </path>
                                                                </g>
                                                                <g>
                                                                    <circle class="eyes" cx="62.1" cy="37.8" r="3.9">
                                                                    </circle>
                                                                    <circle class="eyes" cx="17.9" cy="37.8" r="3.9">
                                                                    </circle>
                                                                </g>
                                                            </g>
                                                        </svg></span></label></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="control-group question textarea textarea-group textarea-group-1  "
                                data-index="2" id="textarea-1125" style="display: block;">
                                <div>
                                    <legend class="block-title" id="block-title-textarea-1125"><label
                                            for="element-textarea-1125">Would you like to add a comment?</label>
                                    </legend>
                                    <textarea class="" placeholder="Please give your feedback here"
                                        id="element-textarea-1125" name="comment"></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button class="btn btn-next pull-right " id="btn_next_17448" type="submit"
                                    style="display: inline-block;">Submit <i
                                        class="mopicon mopicon-angle-right is-context-icon" aria-hidden="true"
                                        icon="angle-right">
                                        <svg viewBox="0 0 9 28">
                                            <path
                                                d="M9.297 15c0 0.125-0.063 0.266-0.156 0.359l-7.281 7.281c-0.094 0.094-0.234 0.156-0.359 0.156s-0.266-0.063-0.359-0.156l-0.781-0.781c-0.094-0.094-0.156-0.219-0.156-0.359 0-0.125 0.063-0.266 0.156-0.359l6.141-6.141-6.141-6.141c-0.094-0.094-0.156-0.234-0.156-0.359s0.063-0.266 0.156-0.359l0.781-0.781c0.094-0.094 0.234-0.156 0.359-0.156s0.266 0.063 0.359 0.156l7.281 7.281c0.094 0.094 0.156 0.234 0.156 0.359z"
                                                fill="currentColor">

                                            </path>
                                        </svg></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>

                    </div>

                </div>
            </div>
        </div>
</form>



@endsection
