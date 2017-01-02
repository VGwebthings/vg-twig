var webpack = require('webpack');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var FaviconsWebpackPlugin = require('favicons-webpack-plugin');
var ImageminPlugin = require('imagemin-webpack-plugin').default;
var autoprefixer = require('autoprefixer');
module.exports = {
    // debug: true,
    // devtool: 'inline-source-map',
    entry: {
        app: './assets/js/app.js'
    },
    output: {
        path: './build',
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
                loader: ExtractTextPlugin.extract('style-loader', 'css-loader?importLoaders=1&-autoprefixer&sourceMap!postcss-loader!sass-loader?sourceMap')
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
        // new webpack.LoaderOptionsPlugin({
        //     options: {
        //         context: __dirname,
        //         debug: true,
        //         postcss: [
        //             autoprefixer({
        //                 browsers: ['last 10 versions'],
        //                 remove: false
        //             })
        //         ]
        //     }
        // }),
        // new webpack.DefinePlugin({
        //     'process.env': {
        //         'NODE_ENV': JSON.stringify('production')
        //     }
        // }),
        new webpack.ProvidePlugin({
            $: 'jquery'
        }),
        // new webpack.NoErrorsPlugin(),
        // new webpack.HotModuleReplacementPlugin(),
        new webpack.optimize.OccurrenceOrderPlugin(),
        new webpack.optimize.DedupePlugin(),
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
        new ExtractTextPlugin('[name].css')
        // new FaviconsWebpackPlugin({
        //     emitStats: false,
        //     logo: './assets/img/browser.png',
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
    },
    postcss: [
        autoprefixer({
            //browsers: ['last 5 versions', '>1%']
            //remove: false
        })
    ],
    sassLoader: {
        outputStyle: 'expanded'
        //sourceComments: true
    }
};
