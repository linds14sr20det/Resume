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
                <button class="btn btn-lg btn-success" @click="showCode(1)" role="button">Show My Answer!</button>
            </div>
        </div>


        <div class='row' v-show="showA1" transition="fade">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h3>Answer to Question 1:</h3>
                <pre>
                    <code>
    class Fixnum
      def plus;       Calc.new.set_op(:+, self); end
      def minus;      Calc.new.set_op(:-, self); end
      def times;      Calc.new.set_op(:*, self); end
      def divided_by; Calc.new.set_op(:/, self); end
    end

    class Calc
      def initialize
        @value = 0
        @op = :+
      end

      def set_op(op, value)
        @op = op
        @value = value

        self
      end

      def op_with(n)
        @value.send(@op, n)
      end

      def zero;  op_with(0); end
      def one;   op_with(1); end
      def two;   op_with(2); end
      def three; op_with(3); end
      def four;  op_with(4); end
      def five;  op_with(5); end
      def six;   op_with(6); end
      def seven; op_with(7); end
      def eight; op_with(8); end
      def nine;  op_with(9); end
    end
                    </code>
                </pre>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h3>Question 2:</h3>
                <p>
                    There is a secret string which is unknown to you. Given a collection of random triplets from the
                    string, recover the original string.<br />

                    A triplet here is defined as a sequence of three letters such that each letter occurs somewhere
                    before the next in the given string. "whi" is a triplet for the string "whatisup".<br />

                    As a simplification, you may assume that no letter occurs more than once in the secret string.<br />

                    You can assume nothing about the triplets given to you other than that they are valid triplets and
                    that they contain sufficient information to deduce the original string. In particular, this means that
                    the secret string will never contain letters that do not occur in one of the triplets given to you. <br />
                </p>
                <pre>
                    <code>
    secret_1 = "whatisup"
    triplets_1 = [
        ['t','u','p'],
        ['w','h','i'],
        ['t','s','u'],
        ['a','t','s'],
        ['h','a','p'],
        ['t','i','s'],
        ['w','h','s']
    ]

    Test.assert_equals(recover_secret(triplets_1), secret_1)
                    </code>
                </pre>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center">
                <button class="btn btn-lg btn-success" @click="showCode(2)" role="button">Show My Answer!</button>
            </div>
        </div>

        <div class='row' v-show="showA2" transition="fade">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h3>Answer to Question 2:</h3>
                <pre>
                    <code>
    function recover_secret(triplets) {
        //Construct tree graph
        var letterGraph = new Graph();
        triplets.forEach(function(triplet) {
            for (var i = 0; i < triplet.length-1; i++) {
                letterGraph.addEdge(triplet[i], triplet[i+1])
            }
        });

        //Find longest path starting from the back of the string, as last letter will have no children
        var starting_node = '';
        letterGraph.node_list.forEach(function(node) {
            if(!node.edge_list_children.length) {
                starting_node = node;
            }
        });

        //Now we have the tree root, we can do a "reverse" dfs for longest path
        //Our "goal" is the path with the length equal to the number of nodes in our graph
        //We can make this recursive for fun
        var path = longestPathInit(letterGraph, starting_node);
        console.log(path);
        return path.printSecret();
    }

    Array.prototype.printSecret = function() {
        var msg = [];
        this.forEach(function(node){
            msg.push(node.name);
        });
        return msg.reverse().join('');
    };

    Array.prototype.containsNode = function(name) {
        var i = this.length;
        while (i--) {
            if (this[i].name === name) {
                return this[i];
            }
        }
        return false;
    };

    function longestPathInit(graph, startNode) {
        var path = [];
        function longestPath(graph, node) {
            if (path.length == graph.node_list.length) {
                return path;
            } else {
                //trim anything that's not needed
                if(node.previous != ''){
                    path.length = path.indexOf(node.previous) + 1;
                }
                path.push(node);
                for (var i = 0; i < node.edge_list_parents.length; i++) {
                    //We could optimize this with some tail call completion down the road.
                    node.edge_list_parents[i].previous = node;
                    longestPath(graph, node.edge_list_parents[i]);

                }
            }
        }
        longestPath(graph, startNode);
        return path;
    }

    var Node = function(name) {
        this.edge_list_children = [];
        this.edge_list_parents = [];
        this.name = name;
        this.previous = '';
    };

    Node.prototype.addChildEdge = function(end){
        this.edge_list_children.push(end);
    };
    Node.prototype.addParentEdge = function(start){
        this.edge_list_parents.push(start);
    };

    var Graph = function(){
        this.node_list = [];
    };

    //We want a one way graph, and each letter only appears once
    Graph.prototype.addEdge = function(start,end){
        var first = this.node_list.containsNode(start);
        var second = this.node_list.containsNode(end);

        if( (!first) || (!second) ){
            if( !first ){
                first = new Node(start);
                this.node_list.push(first);
            }
            if( !second ){
                second = new Node(end);
                this.node_list.push(second);
            }
        }
        //get start node
        var i = this.node_list.length;
        while (i--) {
            if (this.node_list[i].name === start && !this.node_list[i].edge_list_children.containsNode(second.name)) {
                this.node_list[i].addChildEdge(second);
                break;
            }
        }
        //get start node
        var j = this.node_list.length;
        while (j--) {
            if (this.node_list[j].name === end && !this.node_list[j].edge_list_parents.containsNode(first.name)) {
                this.node_list[j].addParentEdge(first);
                break;
            }
        }
    };
                    </code>
                </pre>
            </div>
        </div>
        <div class='row' v-show="showA2" transition="fade">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center">
                <button class="btn btn-lg btn-success" @click="decipherTriplets" role="button">Run My Answer!</button>
            </div>
        </div>
    </div>
</template>

<style>
    pre {
        text-align: left;
    }

    .jumbotron {
        padding-bottom: 0!important;
    }
</style>

<script>

    function recover_secret(triplets) {
        //Construct tree graph
        var letterGraph = new Graph();
        triplets.forEach(function(triplet) {
            for (var i = 0; i < triplet.length-1; i++) {
                letterGraph.addEdge(triplet[i], triplet[i+1])
            }
        });

        //Find longest path starting from the back of the string, as last letter will have no children
        var starting_node = '';
        letterGraph.node_list.forEach(function(node) {
            if(!node.edge_list_children.length) {
                starting_node = node;
            }
        });

        //Now we have the tree root, we can do a "reverse" dfs for longest path
        //Our "goal" is the path with the length equal to the number of nodes in our graph
        //We can make this recursive for fun
        var path = longestPathInit(letterGraph, starting_node);
        console.log(path);
        return path.printSecret();
    }

    Array.prototype.printSecret = function() {
        var msg = [];
        this.forEach(function(node){
            msg.push(node.name);
        });
        return msg.reverse().join('');
    };

    Array.prototype.containsNode = function(name) {
        var i = this.length;
        while (i--) {
            if (this[i].name === name) {
                return this[i];
            }
        }
        return false;
    };

    function longestPathInit(graph, startNode) {
        var path = [];
        function longestPath(graph, node) {
            if (path.length == graph.node_list.length) {
                return path;
            } else {
                //trim anything that's not needed
                if(node.previous != ''){
                    path.length = path.indexOf(node.previous) + 1;
                }
                path.push(node);
                for (var i = 0; i < node.edge_list_parents.length; i++) {
                    //We could optimize this with some tail call completion down the road.
                    node.edge_list_parents[i].previous = node;
                    longestPath(graph, node.edge_list_parents[i]);

                }
            }
        }
        longestPath(graph, startNode);
        return path;
    }

    var Node = function(name) {
        this.edge_list_children = [];
        this.edge_list_parents = [];
        this.name = name;
        this.previous = '';
    };

    Node.prototype.addChildEdge = function(end){
        this.edge_list_children.push(end);
    };
    Node.prototype.addParentEdge = function(start){
        this.edge_list_parents.push(start);
    };

    var Graph = function(){
        this.node_list = [];
    };

    //We want a one way graph, and each letter only appears once
    Graph.prototype.addEdge = function(start,end){
        var first = this.node_list.containsNode(start);
        var second = this.node_list.containsNode(end);

        if( (!first) || (!second) ){
            if( !first ){
                first = new Node(start);
                this.node_list.push(first);
            }
            if( !second ){
                second = new Node(end);
                this.node_list.push(second);
            }
        }
        //get start node
        var i = this.node_list.length;
        while (i--) {
            if (this.node_list[i].name === start && !this.node_list[i].edge_list_children.containsNode(second.name)) {
                this.node_list[i].addChildEdge(second);
                break;
            }
        }
        //get start node
        var j = this.node_list.length;
        while (j--) {
            if (this.node_list[j].name === end && !this.node_list[j].edge_list_parents.containsNode(first.name)) {
                this.node_list[j].addParentEdge(first);
                break;
            }
        }
    };

    export default {
        props: {
            showA1: { default: false },
            showA2: { default: false },
            runA2: { default: false }
        },


        methods: {
            showCode: function(show) {
                switch (show) {
                    case 1:
                        this.showA1 = this.showA1 ? false : true;
                        break;
                    case 2:
                        this.showA2 = this.showA2 ? false : true;
                        break;
                }
            },
            decipherTriplets: function() {
                secret_1 = "whatisup";
                triplets_1 = [
                    ['t','u','p'],
                    ['w','h','i'],
                    ['t','s','u'],
                    ['a','t','s'],
                    ['h','a','p'],
                    ['t','i','s'],
                    ['w','h','s'],
                    ['h','u','p']
                ];
                alert(recover_secret(triplets_1));
            }
        }
    };
</script>
