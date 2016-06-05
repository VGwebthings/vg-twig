//var ExtractTextPlugin = require('extract-text-webpack-plugin');
module.exports = {
    entry: {
        app: './assets/js/app.js'
    },
    output: {
        path: './build',
        filename: '[name].js'
    },
    //debug: true,
    //devtool: 'inline-source-map',
    module: {
        loaders: [
            {
                test: /\.scss/,
                //loader: 'style!css!autoprefixer!sass?outputStyle=compressed'
                //loader: 'style!css?sourceMap!sass?sourceMap&outputStyle=expanded'
                loader: ExtractTextPlugin.extract('style', 'css!autoprefixer!sass?outputStyle=compressed')
            },
            {
                test: /\.css$/,
                loader: 'style!css!autoprefixer'
            },
            {
                test: /\.(png|jpg|svg)$/,
                loader: 'url-loader?limit=16384'
            }
            // {
            //    test: /\.(eot|ttf|otf)$/,
            //    //loader: 'file?name=public/fonts/[name].[ext]'
            //    loader: 'file'
            // },
            // {
            //    include: /\.json$/,
            //    loaders: ['json']
            // }
            // {
            //    test: './assets/js',
            //    loader: "buble-loader"
            // }
        ]
    },
    plugins: [
        new ExtractTextPlugin('[name].css')
    ]
};
