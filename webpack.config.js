var webpack = require('webpack');
var ModernizrWebpackPlugin = require('modernizr-webpack-plugin');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
// var FaviconsWebpackPlugin = require('favicons-webpack-plugin');
// var ImageminPlugin = require('imagemin-webpack-plugin').default;
var autoprefixer = require('autoprefixer');
var ModernizrConfig = {
    'minify': true,
    'options': [
        'mq',
        'setClasses'
    ],
    'feature-detects': [
        'geolocation',
        'storage/localstorage',
        'storage/sessionstorage'
    ]
};
module.exports = {
    entry: {
        app: './assets/js/app.js'
    },
    output: {
        path: __dirname + '/build',
        filename: '[name].js'
    },
    module: {
        loaders: [
            {
                test: /\.json$/,
                loader: 'json'
            },
            {
                test: /\.css$/,
                loader: 'style-loader!css-loader?importLoaders=1&-autoprefixer&sourceMap!postcss-loader'
            },
            {
                test: /\.scss/,
                loader: ExtractTextPlugin.extract({fallback: 'style-loader', use: 'css-loader?importLoaders=1&-autoprefixer!postcss-loader!sass-loader'})
                //loader: 'style-loader!css-loader?importLoaders=1&-autoprefixer&sourceMap!postcss-loader!sass-loader?sourceMap'
            },
            {
                test: /\.(png|jpg|svg)$/,
                loader: 'url-loader?limit=32768'
            },
            {
                test: /\.(eot|ttf|otf|woff|woff2)$/,
                loader: 'file-loader'
            }
        ]
    },
    plugins: [
        // new webpack.NoEmitOnErrorsPlugin(),
        new webpack.LoaderOptionsPlugin({
            options: {
                context: __dirname,
                debug: true
            }
        }),
        new webpack.DefinePlugin({
            'process.env': {
                // 'NODE_ENV': JSON.stringify('production')
            }
        }),
        new webpack.ProvidePlugin({
            $: 'jquery'
        }),
        // new webpack.HotModuleReplacementPlugin(),
        // new webpack.optimize.OccurrenceOrderPlugin(),
        // new webpack.optimize.UglifyJsPlugin({
        //     compress: {
        //         warnings: false
        //     },
        //     minimize: true,
        //     output: {
        //         comments: false
        //     },
        //     sourceMap: false
        // }),
        new ModernizrWebpackPlugin(ModernizrConfig),
        new ExtractTextPlugin('[name].css'),
        // new FaviconsWebpackPlugin({
        //     emitStats: false,
        //     inject: true,
        //     logo: './assets/img/logo.svg',
        //     persistentCache: true
        // })
        // new ImageminPlugin({
        //     disable: process.env.NODE_ENV !== 'production',
        //     pngquant: {
        //         quality: '95-100'
        //     }
        // })
    ],
    externals: {
        'jquery': 'jQuery'
    }
};
