<template>
    <div class="container" transition="fade">
        <div class='jumbotron'>
            <h1>Coding Challenge Q's</h1>
            <p class="lead">Here's the latest coding interview questions I've been asked to solve.</p>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h3>Question 1:</h3>
                <p>
                    The Kata is inspired by Calculating with Functions Kata for JavaScript.<br />
                    The goal is to implement simple calculator which uses fluent syntax:<br />
                </p>
                <pre>
                    <code>
    Calc.new.one.plus.two # Should return 3

    Calc.new.five.minus.six # Should return ­1

    Calc.new.seven.times.two # Should return 14

    Calc.new.nine.divided_by.three # Should return 3
                    </code>
                </pre>
                <p>
                    There are only four operations that are supported (plus, minus, times, divided_by) and 10 digits (zero, one, two, three, four, five, six, seven, eight, nine).<br />
                    Each calculation consists of one operation only.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center">
                <button class="btn btn-lg btn-success" @click="showCode" role="button">Show My Answer!</button>
            </div>
        </div>


        <div class='row' v-show="showA1" transition="fade">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h3>Answer to Question 1:</h3>
                <pre>
                    <code>
    function Panel(element, canClose, closeHandler) {
        this.element = element;
        this.canClose = canClose;
        this.closeHandler = function () { if (closeHandler) closeHandler() };
    }
                    </code>
                </pre>
            </div>
        </div>


        <div class="row" v-show="showA1">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center">
                <button class="btn btn-lg btn-success" @click="runCode" role="button">Run My Answer!</button>
            </div>
        </div>
        <div class='row' v-show="runA1" transition="fade">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h3>Output:</h3>
                <pre>
                    <code>
    Output of Stuff
                    </code>
                </pre>
            </div>
        </div>


    </div>
</template>

<style>
    pre {
        text-align: left;
    }

    .jumbotron {
        padding-bottom: 0px!important;
    }
</style>

<script>
    var Calc = function () {

    };

    Calc.prototype.new = new Calc();

    export default {
        props: {
            showA1: { default: false },
            runA1: { default: false }
        },

        methods: {
            showCode: function() {
                this.showA1 = this.showA1 ? false : true;
            },
            runCode: function() {
                this.runA1 = true;
                console.log(Calc.new.one.plus.two);
            },
        }
    };
</script>
