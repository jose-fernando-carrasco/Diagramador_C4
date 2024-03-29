/*! JointJS+ v3.5.0 - HTML5 Diagramming Framework - TRIAL VERSION

Copyright (c) 2022 client IO

 2022-10-13 


This Source Code Form is subject to the terms of the JointJS+ Trial License
, v. 2.0. If a copy of the JointJS+ License was not distributed with this
file, You can obtain one at http://jointjs.com/license/rappid_v2.txt
 or from the JointJS+ archive as was distributed by client IO. See the LICENSE file.*/


var App = App || {};
App.config = App.config || {};

(function() {

    'use strict';

    App.config.stencil = {};

    App.config.stencil.groups = {
        standard: { index: 1, label: 'Standard shapes' },
        //fsa: { index: 2, label: 'State machine' },
        //pn: { index: 3, label: 'Petri nets' },
        //erd: { index: 4, label: 'Entity-relationship' },
        //uml: { index: 5, label: 'UML' },
        //org: { index: 6, label: 'ORG' }
    };

    App.config.stencil.shapes = {};

    App.config.stencil.shapes.standard = [{
            type: 'custom.Actor',
            size: { width: 6, height: 5 },
            attrs: {
                root: {
                    dataTooltip: 'Person',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    strokeWidth: 2,
                    stroke: '#0B3661',
                    strokeDasharray: '0',
                    fill: '#083F75',
                },
                titulo: {
                    text: ' ',
                    fontSize: 15,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Bold',
                },
                subtitulo: {
                    text: 'person name',
                    fontSize: 11,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
                contenido: {
                    text: ' ',
                    fontSize: 12,
                    fill: '#333333',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
            }
        },
        {
            type: 'custom.Actor',
            size: { width: 6, height: 5 },
            attrs: {
                root: {
                    dataTooltip: 'External Person',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    strokeWidth: 2,
                    stroke: '#4D4D4D',
                    strokeDasharray: '0',
                    fill: '#6C6477',
                },
                titulo: {
                    text: ' ',
                    fontSize: 15,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Bold',
                },
                subtitulo: {
                    text: 'external person',
                    fontSize: 11,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
                contenido: {
                    text: ' ',
                    fontSize: 12,
                    fill: '#333333',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
            }
        },
        {
            type: 'custom.Rectangulo',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'System',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    rx: 2,
                    ry: 2,
                    width: 50,
                    height: 30,
                    fill: '#1061B0',
                    stroke: '#0D5091',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                titulo: {
                    text: ' ',
                    fontSize: 15,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Bold',
                },
                subtitulo: {
                    text: 'system name',
                    fontSize: 11,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
                contenido: {
                    text: ' ',
                    fontSize: 12,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
            }
        },
        {
            type: 'custom.Rectangulo',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'External system',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    rx: 2,
                    ry: 2,
                    width: 50,
                    height: 30,
                    fill: '#8C8496',
                    stroke: '#736782',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                titulo: {
                    text: ' ',
                    fontSize: 15,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Bold',
                },
                subtitulo: {
                    text: 'external system',
                    fontSize: 11,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
                contenido: {
                    text: ' ',
                    fontSize: 12,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
            }
        },
        {
            type: 'custom.Rectangulo',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Container',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    rx: 2,
                    ry: 2,
                    width: 50,
                    height: 30,
                    fill: '#23A2D9',
                    stroke: '#0E7DAD',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                titulo: {
                    text: ' ',
                    fontSize: 15,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Bold',
                },
                subtitulo: {
                    text: 'container name',
                    fontSize: 11,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
                contenido: {
                    text: ' ',
                    fontSize: 12,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
            }
        },
        {
            type: 'custom.Bum',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Container',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    rx: 2,
                    ry: 2,
                    width: 50,
                    height: 30,
                    fill: 'transparent',
                    stroke: '#B9B6B6',
                    strokeWidth: 2,
                    strokeDasharray: '10.5',
                },
            }
        },
        {
            type: 'custom.BD',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Base de Datos',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    fill: '#23A2D9',
                    stroke: '#0E7DAD',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                top: {
                    fill: '#23A2D9',
                    stroke: '#0E7DAD',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                titulo: {
                    text: ' ',
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                },
                subtitulo: {
                    text: 'BD',
                    fontSize: 11,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
                contenido: {
                    text: ' ',
                    fontSize: 12,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
            }
        },
        {
            type: 'uml.Class',
            name: 'Class',
            attributes: ['+attr1'],
            methods: ['-setAttr1()'],
            size: {
                width: 150,
                height: 100
            },
            attrs: {
                root: {
                    dataTooltip: 'Class',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.uml-class-name-rect': {
                    top: 2,
                    fill: '#CED7E0',
                    stroke: '#040404',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-attrs-rect': {
                    top: 2,
                    fill: '#CED7E0',
                    stroke: '#040404',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-methods-rect': {
                    top: 2,
                    fill: '#CED7E0',
                    stroke: '#040404',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-name-text': {
                    ref: '.uml-class-name-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#030303',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-attrs-text': {
                    ref: '.uml-class-attrs-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#030303',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-methods-text': {
                    ref: '.uml-class-methods-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#030303',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                }
            }
        },
        {
            type: 'custom.penta',
            size: { width: 6, height: 5 },
            attrs: {
                root: {
                    dataTooltip: 'Microservice',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    strokeWidth: 2,
                    stroke: '#0E7DAD',
                    strokeDasharray: '0',
                    fill: '#23A2D9',
                },
                titulo: {
                    text: ' ',
                    fontSize: 15,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Bold',
                },
                subtitulo: {
                    text: 'microservice',
                    fontSize: 11,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
                contenido: {
                    text: ' ',
                    fontSize: 12,
                    fill: '#333333',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
            }
        },
        {
            type: 'custom.web',
            size: { width: 6, height: 5 },
            attrs: {
                root: {
                    dataTooltip: 'Web browser',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    strokeWidth: 2,
                    stroke: '#0E7DAD',
                    strokeDasharray: '0',
                    fill: '#23A2D9',
                },
                titulo: {
                    text: ' ',
                    fontSize: 15,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Bold',
                },
                subtitulo: {
                    text: 'Browser',
                    fontSize: 11,
                    fill: '#F7F8F9',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
                contenido: {
                    text: ' ',
                    fontSize: 12,
                    fill: '#333333',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                },
            }
        }
        /*,       
                        {
                            type: 'standard.Rectangle',
                            size: { width: 5, height: 3 },
                            attrs: {
                                root: {
                                    dataTooltip: 'Rectangle',
                                    dataTooltipPosition: 'left',
                                    dataTooltipPositionSelector: '.joint-stencil'
                                },
                                body: {
                                    rx: 2,
                                    ry: 2,
                                    width: 50,
                                    height: 30,
                                    fill: 'transparent',
                                    stroke: '#31d0c6',
                                    strokeWidth: 2,
                                    strokeDasharray: '0'
                                },
                                label: {
                                    text: 'rect',
                                    fill: '#c6c7e2',
                                    fontFamily: 'Roboto Condensed',
                                    fontWeight: 'Normal',
                                    fontSize: 11,
                                    strokeWidth: 0
                                }
                            }
                        },
                        {
                            type: 'standard.Ellipse',
                            size: { width: 5, height: 3 },
                            attrs: {
                                root: {
                                    dataTooltip: 'Ellipse',
                                    dataTooltipPosition: 'left',
                                    dataTooltipPositionSelector: '.joint-stencil'
                                },
                                body: {
                                    width: 50,
                                    height: 30,
                                    fill: 'transparent',
                                    stroke: '#31d0c6',
                                    strokeWidth: 2,
                                    strokeDasharray: '0'
                                },
                                label: {
                                    text: 'ellipse',
                                    fill: '#c6c7e2',
                                    fontFamily: 'Roboto Condensed',
                                    fontWeight: 'Normal',
                                    fontSize: 11,
                                    strokeWidth: 0
                                }
                            }
                        },
                        {
                            type: 'app.RectangularModel',
                            size: { width: 40, height: 30 },
                            allowOrthogonalResize: false,
                            attrs: {
                                root: {
                                    dataTooltip: 'Rectangle with ports',
                                    dataTooltipPosition: 'left',
                                    dataTooltipPositionSelector: '.joint-stencil'
                                },
                                body: {
                                    fill: 'transparent',
                                    rx: 2,
                                    ry: 2,
                                    stroke: '#31d0c6',
                                    strokeWidth: 2,
                                    strokeDasharray: '0'
                                },
                                label: {
                                    text: 'rect',
                                    fill: '#c6c7e2',
                                    fontFamily: 'Roboto Condensed',
                                    fontWeight: 'Normal',
                                    fontSize: 11,
                                    strokeWidth: 0
                                }
                            },
                            ports: {
                                items: [
                                    { group: 'in' },
                                    { group: 'in' },
                                    { group: 'out' }
                                ]
                            }
                        },
                        {
                            type: 'app.CircularModel',
                            size: { width: 5, height: 3 },
                            allowOrthogonalResize: false,
                            attrs: {
                                root: {
                                    dataTooltip: 'Ellipse with ports',
                                    dataTooltipPosition: 'left',
                                    dataTooltipPositionSelector: '.joint-stencil'
                                },
                                body: {
                                    fill: 'transparent',
                                    stroke: '#31d0c6',
                                    strokeWidth: 2,
                                    strokeDasharray: '0',
                                },
                                label: {
                                    text: 'ellipse',
                                    fill: '#c6c7e2',
                                    fontFamily: 'Roboto Condensed',
                                    fontWeight: 'Normal',
                                    fontSize: 11,
                                    strokeWidth: 0
                                }
                            },
                            ports: {
                                items: [
                                    { group: 'in' },
                                    { group: 'in' },
                                    { group: 'out' }
                                ]
                            }
                        },
                        {
                            type: 'standard.Polygon',
                            size: { width: 5, height: 3 },
                            attrs: {
                                root: {
                                    dataTooltip: 'Rhombus',
                                    dataTooltipPosition: 'left',
                                    dataTooltipPositionSelector: '.joint-stencil'
                                },
                                body: {
                                    refPoints: '50,0 100,50 50,100 0,50',
                                    fill: 'transparent',
                                    stroke: '#31d0c6',
                                    strokeWidth: 2,
                                    strokeDasharray: '0'
                                },
                                label: {
                                    text: 'rhombus',
                                    fill: '#c6c7e2',
                                    fontFamily: 'Roboto Condensed',
                                    fontWeight: 'Normal',
                                    fontSize: 11,
                                    strokeWidth: 0
                                }
                            }
                        },
                        {
                            type: 'standard.Cylinder',
                            size: { width: 5, height: 3 },
                            attrs: {
                                root: {
                                    dataTooltip: 'Cylinder',
                                    dataTooltipPosition: 'left',
                                    dataTooltipPositionSelector: '.joint-stencil'
                                },
                                body: {
                                    fill: 'transparent',
                                    stroke: '#31d0c6',
                                    strokeWidth: 2,
                                    strokeDasharray: '0'
                                },
                                top: {
                                    fill: '#31d0c6',
                                    stroke: '#31d0c6',
                                    strokeWidth: 2,
                                    strokeDasharray: '0'
                                },
                                label: {
                                    text: 'cylinder',
                                    fill: '#c6c7e2',
                                    fontFamily: 'Roboto Condensed',
                                    fontWeight: 'Normal',
                                    fontSize: 11,
                                    strokeWidth: 0
                                }
                            }
                        },
                        {
                            type: 'standard.Image',
                            size: { width: 53, height: 42 },
                            attrs: {
                                root: {
                                    dataTooltip: 'Image',
                                    dataTooltipPosition: 'left',
                                    dataTooltipPositionSelector: '.joint-stencil'
                                },
                                image: {
                                    xlinkHref: '../../../../assets/image-icon1.svg'
                                },
                                body: {
                                    fill: 'transparent',
                                    stroke: '#31d0c6',
                                    strokeWidth: 2,
                                    strokeDasharray: '0'
                                },
                                label: {
                                    text: 'image',
                                    fontFamily: 'Roboto Condensed',
                                    fontWeight: 'Normal',
                                    fontSize: 11,
                                    fill: '#c6c7e2'
                                }
                            }
                        },
                        {
                            type: 'standard.EmbeddedImage',
                            size: { width: 5, height: 3 },
                            attrs: {
                                root: {
                                    dataTooltip: 'Card',
                                    dataTooltipPosition: 'left',
                                    dataTooltipPositionSelector: '.joint-stencil'
                                },
                                body: {
                                    fill: 'transparent',
                                    stroke: '#31d0c6',
                                    strokeWidth: 2,
                                    strokeDasharray: '0'
                                },
                                image: {
                                    xlinkHref: '../../../../assets/image-icon1.svg'
                                },
                                label: {
                                    text: 'card',
                                    fill: '#c6c7e2',
                                    fontFamily: 'Roboto Condensed',
                                    fontWeight: 'Normal',
                                    fontSize: 11,
                                    strokeWidth: 0
                                }
                            }
                        }, */
        /* {
            type: 'standard.InscribedImage',
            size: { width: 1, height: 1 },
            attrs: {
                root: {
                    dataTooltip: 'Icon',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                border: {
                    stroke: '#31d0c6',
                    strokeWidth: 3,
                    strokeDasharray: '0'
                },
                background: {
                    fill: 'transparent'
                },
                image: {
                    xlinkHref: '../../../../assets/image-icon1.svg'
                },
                label: {
                    text: 'icon',
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0
                }
            }
        },
        {
            type: 'standard.HeaderedRectangle',
            size: { width: 5, height: 3 },
            attrs: {
                root: {
                    dataTooltip: 'Rectangle with header',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                body: {
                    fill: 'transparent',
                    stroke: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0'
                },
                header: {
                    stroke: '#31d0c6',
                    fill: '#31d0c6',
                    strokeWidth: 2,
                    strokeDasharray: '0',
                    height: 20
                },
                bodyText: {
                    textWrap: {
                        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur molestie.',
                        width: -10,
                        height: -20,
                        ellipsis: true
                    },
                    fill: '#c6c7e2',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    refY2: 12,
                },
                headerText: {
                    text: 'header',
                    fill: '#f6f6f6',
                    fontFamily: 'Roboto Condensed',
                    fontWeight: 'Normal',
                    fontSize: 11,
                    strokeWidth: 0,
                    refY: 12
                }
            }
        } */
    ];

    /* App.config.stencil.shapes.fsa = [

        {
            type: 'fsa.StartState',
            preserveAspectRatio: true,
            attrs: {
                root: {
                    dataTooltip: 'Start State',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                circle: {
                    width: 50,
                    height: 30,
                    fill: '#61549c',
                    'stroke-width': 0
                },
                text: {
                    text: 'startState',
                    fill: '#c6c7e2',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11,
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'fsa.EndState',
            preserveAspectRatio: true,
            attrs: {
                root: {
                    dataTooltip: 'End State',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.inner': {
                    fill: '#6a6c8a',
                    stroke: 'transparent'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#61549c',
                    'stroke-width': 2,
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'endState',
                    fill: '#c6c7e2',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11,
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'fsa.State',
            preserveAspectRatio: true,
            attrs: {
                root: {
                    dataTooltip: 'State',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                circle: {
                    fill: '#6a6c8a',
                    stroke: '#61549c',
                    'stroke-width': 2,
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'state',
                    fill: '#c6c7e2',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11,
                    'stroke-width': 0
                }
            }
        }
    ]; */

    /* App.config.stencil.shapes.pn = [

        {
            type: 'pn.Place',
            preserveAspectRatio: true,
            tokens: 3,
            attrs: {
                root: {
                    dataTooltip: 'Place',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.root': {
                    fill: 'transparent',
                    stroke: '#61549c',
                    'stroke-width': 2,
                    'stroke-dasharray': '0'
                },
                '.tokens circle': {
                    fill: '#6a6c8a',
                    stroke: '#000',
                    'stroke-width': 0
                },
                '.label': {
                    text: '',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal'
                }
            }
        },
        {
            type: 'pn.Transition',
            preserveAspectRatio: true,
            attrs: {
                root: {
                    dataTooltip: 'Transition',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                rect: {
                    rx: 3,
                    ry: 3,
                    width: 12,
                    height: 50,
                    fill: '#61549c',
                    stroke: '#7c68fc',
                    'stroke-width': 0,
                    'stroke-dasharray': '0'
                },
                '.label': {
                    text: 'transition',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'stroke-width': 0,
                    'fill': '#222138'
                }
            }
        }
    ]; */

    /* App.config.stencil.shapes.erd = [

        {
            type: 'erd.Entity',
            attrs: {
                root: {
                    dataTooltip: 'Entity',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    rx: 3,
                    ry: 3,
                    fill: '#31d0c6',
                    'stroke-width': 2,
                    stroke: 'transparent',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Entity',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.WeakEntity',
            attrs: {
                root: {
                    dataTooltip: 'Weak Entity',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#feb663',
                    'stroke-width': 2,
                    points: '100,0 100,60 0,60 0,0',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#feb663',
                    stroke: 'transparent',
                    points: '97,5 97,55 3,55 3,5',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Weak entity',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.Relationship',
            attrs: {
                root: {
                    dataTooltip: 'Relationship',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: '#61549c',
                    stroke: 'transparent',
                    'stroke-width': 2,
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Relation',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.IdentifyingRelationship',
            attrs: {
                root: {
                    dataTooltip: 'Identifying Relationship',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#6a6c8a',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#6a6c8a',
                    stroke: 'transparent',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Relation',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.ISA',
            attrs: {
                root: {
                    dataTooltip: 'ISA',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                text: {
                    text: 'ISA',
                    fill: '#f6f6f6',
                    'letter-spacing': 0,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                polygon: {
                    fill: '#feb663',
                    stroke: 'transparent',
                    'stroke-dasharray': '0'
                }
            }
        },
        {
            type: 'erd.Key',
            attrs: {
                root: {
                    dataTooltip: 'Key',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#fe854f',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#fe854f',
                    stroke: 'transparent',
                    display: 'block',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Key',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.Normal',
            attrs: {
                root: {
                    dataTooltip: 'Normal',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: '#feb663',
                    stroke: 'transparent',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Normal',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.Multivalued',
            attrs: {
                root: {
                    dataTooltip: 'Mutltivalued',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#fe854f',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#fe854f',
                    stroke: 'transparent',
                    rx: 43,
                    ry: 21,
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'MultiValued',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    fill: '#f6f6f6',
                    'stroke-width': 0
                }
            }
        },
        {
            type: 'erd.Derived',
            attrs: {
                root: {
                    dataTooltip: 'Derived',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.outer': {
                    fill: 'transparent',
                    stroke: '#fe854f',
                    'stroke-dasharray': '0'
                },
                '.inner': {
                    fill: '#feb663',
                    stroke: 'transparent',
                    'display': 'block',
                    'stroke-dasharray': '0'
                },
                text: {
                    text: 'Derived',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11,
                    'stroke-width': 0
                }
            }
        }
    ]; */

    /* App.config.stencil.shapes.uml = [

        {
            type: 'uml.Class',
            name: 'Class',
            attributes: ['+attr1'],
            methods: ['-setAttr1()'],
            size: {
                width: 150,
                height: 100
            },
            attrs: {
                root: {
                    dataTooltip: 'Class',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.uml-class-name-rect': {
                    top: 2,
                    fill: '#61549c',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-attrs-rect': {
                    top: 2,
                    fill: '#61549c',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-methods-rect': {
                    top: 2,
                    fill: '#61549c',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-name-text': {
                    ref: '.uml-class-name-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-attrs-text': {
                    ref: '.uml-class-attrs-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-methods-text': {
                    ref: '.uml-class-methods-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                }
            }
        },
        {
            type: 'uml.Interface',
            name: 'Interface',
            attributes: ['+attr1'],
            methods: ['-setAttr1()'],
            size: {
                width: 150,
                height: 100
            },
            attrs: {
                root: {
                    dataTooltip: 'Interface',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.uml-class-name-rect': {
                    fill: '#fe854f',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-attrs-rect': {
                    fill: '#fe854f',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-methods-rect': {
                    fill: '#fe854f',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-name-text': {
                    ref: '.uml-class-name-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-attrs-text': {
                    ref: '.uml-class-attrs-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-size': 11
                },
                '.uml-class-methods-text': {
                    ref: '.uml-class-methods-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                }
            }
        },
        {
            type: 'uml.Abstract',
            name: 'Abstract',
            attributes: ['+attr1'],
            methods: ['-setAttr1()'],
            size: {
                width: 150,
                height: 100
            },
            attrs: {
                root: {
                    dataTooltip: 'Abstract',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.uml-class-name-rect': {
                    fill: '#6a6c8a',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-attrs-rect': {
                    fill: '#6a6c8a',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-methods-rect': {
                    fill: '#6a6c8a',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8
                },
                '.uml-class-name-text': {
                    ref: '.uml-class-name-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-attrs-text': {
                    ref: '.uml-class-attrs-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                },
                '.uml-class-methods-text': {
                    ref: '.uml-class-methods-rect',
                    'ref-y': 0.5,
                    'y-alignment': 'middle',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 11
                }
            }
        },

        {
            type: 'uml.State',
            name: 'State',
            events: ['entry/', 'create()'],
            size: {
                width: 150,
                height: 100
            },
            attrs: {
                root: {
                    dataTooltip: 'State',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.uml-state-body': {
                    fill: '#feb663',
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    rx: 8,
                    ry: 8,
                    'stroke-dasharray': '0'
                },
                '.uml-state-separator': {
                    stroke: '#f6f6f6',
                    'stroke-width': 1,
                    'stroke-dasharray': '0'
                },
                '.uml-state-name': {
                    fill: '#f6f6f6',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal'
                },
                '.uml-state-events': {
                    fill: '#f6f6f6',
                    'font-size': 11,
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal'
                }
            }
        }
    ]; */

    /* App.config.stencil.shapes.org = [

        {
            type: 'org.Member',
            attrs: {
                root: {
                    dataTooltip: 'Member',
                    dataTooltipPosition: 'left',
                    dataTooltipPositionSelector: '.joint-stencil'
                },
                '.rank': {
                    text: 'Rank',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-size': 12,
                    'font-weight': 'Bold',
                    'text-decoration': 'none'
                },
                '.name': {
                    text: 'Person',
                    fill: '#f6f6f6',
                    'font-family': 'Roboto Condensed',
                    'font-weight': 'Normal',
                    'font-size': 10
                },
                '.card': {
                    fill: '#31d0c6',
                    stroke: 'transparent',
                    'stroke-width': 0,
                    'stroke-dasharray': '0'
                },
                image: {
                    width: 32,
                    height: 32,
                    x: 16,
                    y: 13,
                    ref: null,
                    'ref-x': null,
                    'ref-y': null,
                    'y-alignment': null,
                    'xlink:href': '../../../../assets/member-male.png'
                }
            }
        }
    ]; 
    */

})();