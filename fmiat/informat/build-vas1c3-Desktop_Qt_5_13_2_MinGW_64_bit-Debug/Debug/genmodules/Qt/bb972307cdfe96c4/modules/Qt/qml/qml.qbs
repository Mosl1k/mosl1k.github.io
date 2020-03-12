import qbs.TextFile
import '../QtModule.qbs' as QtModule
import "qml.js" as Qml

QtModule {
    qtModuleName: "Qml"
    Depends { name: "Qt"; submodules: ["core","network"]}

    property string qmlImportScannerName: "qmlimportscanner"
    property string qmlImportScannerFilePath: Qt.core.binPath + '/' + qmlImportScannerName
    property string qmlPath: "D:/Qt/Qt5.13.2/5.13.2/mingw73_64/qml"

    property bool generateCacheFiles: false
    Depends { name: "Qt.qmlcache"; condition: generateCacheFiles; required: false }
    readonly property bool cachingEnabled: generateCacheFiles && Qt.qmlcache.present
    property string qmlCacheGenPath
    Properties {
        condition: cachingEnabled
        Qt.qmlcache.qmlCacheGenPath: qmlCacheGenPath || original
        Qt.qmlcache.installDir: cacheFilesInstallDir || original
    }

    property string cacheFilesInstallDir

    readonly property string pluginListFilePathDebug: product.buildDirectory + "/plugins.list.d"
    readonly property string pluginListFilePathRelease: product.buildDirectory + "/plugins.list"
    property bool linkPlugins: isStaticLibrary && Qt.plugin_support.linkPlugins

    hasLibrary: true
    architectures: ["x86_64"]
    targetPlatform: "windows"
    staticLibsDebug: (linkPlugins ? ['@' + pluginListFilePathDebug] : []).concat([])
    staticLibsRelease: (linkPlugins ? ['@' + pluginListFilePathRelease] : []).concat([])
    dynamicLibsDebug: []
    dynamicLibsRelease: []
    linkerFlagsDebug: []
    linkerFlagsRelease: []
    frameworksDebug: []
    frameworksRelease: []
    frameworkPathsDebug: []
    frameworkPathsRelease: []
    libNameForLinkerDebug: "Qt5Qmld"
    libNameForLinkerRelease: "Qt5Qml"
    libFilePathDebug: "D:/Qt/Qt5.13.2/5.13.2/mingw73_64/lib/libQt5Qmld.a"
    libFilePathRelease: "D:/Qt/Qt5.13.2/5.13.2/mingw73_64/lib/libQt5Qml.a"
    pluginTypes: ["qmltooling"]
    moduleConfig: ["lex","yacc","depend_includepath","testcase_targets","import_plugins","import_qpa_plugin","windows","qt_build_extra","file_copies","qmake_use","qt","warn_on","release","link_prl","debug_and_release","precompile_header","shared","release","no_plugin_manifest","win32","mingw","gcc","copy_dir_files","sse2","aesni","sse3","ssse3","sse4_1","sse4_2","compile_examples","largefile","optimize_debug","precompile_header","rdrnd","shani","x86SimdAlways","prefix_build","force_independent","utf8_source","create_prl","link_prl","prepare_docs","qt_docs_targets","no_private_qt_headers_warning","QTDIR_build","qt_example_installs","exceptions_off","testcase_exceptions","warning_clean","python_available","release","ReleaseBuild","Release","build_pass","release","ReleaseBuild","Release","build_pass","qt_tracepoints","qlalr","generated_privates","relative_qt_rpath","git_build","qmake_cache","target_qt","c++11","strict_c++","c++14","c++1z","c99","c11","qt_install_headers","need_fwd_pri","qt_install_module","debug_and_release","build_all","create_cmake","skip_target_version_ext","compiler_supports_fpmath","create_pc","release","ReleaseBuild","Release","build_pass","have_target","dll","exclusive_builds","no_autoqmake","thread","moc","resources"]
    cpp.defines: ["QT_QML_LIB"]
    cpp.includePaths: ["D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include","D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/QtQml"]
    cpp.libraryPaths: []
    Group {
        files: [Qt["qml"].libFilePath]
        filesAreTargets: true
        fileTags: ["dynamiclibrary_import"]
    }

    FileTagger {
        patterns: ["*.qml"]
        fileTags: ["qt.qml.qml"]
    }

    FileTagger {
        patterns: ["*.js"]
        fileTags: ["qt.qml.js"]
    }

    Rule {
        condition: linkPlugins
        multiplex: true
        requiresInputs: false
        inputs: ["qt.qml.qml"]
        outputFileTags: ["cpp", "qt.qml.pluginlist"]
        outputArtifacts: {
            var list = [];
            if (inputs["qt.qml.qml"])
                list.push({ filePath: "qml_plugin_import.cpp", fileTags: ["cpp"] });
            list.push({
                filePath: product.Qt.core.qtBuildVariant === "debug"
                              ? product.Qt.qml.pluginListFilePathDebug
                              : product.Qt.qml.pluginListFilePathRelease,
                fileTags: ["qt.qml.pluginlist"]
            });
            return list;
        }
        prepare: {
            var cmd = new JavaScriptCommand();
            if (inputs["qt.qml.qml"])
                cmd.description = "Creating " + outputs["cpp"][0].fileName;
            else
                cmd.silent = true;
            cmd.sourceCode = function() {
                var qmlInputs = inputs["qt.qml.qml"];
                if (!qmlInputs)
                    qmlInputs = [];
                var scannerData = Qml.scannerData(product.Qt.qml.qmlImportScannerFilePath,
                        qmlInputs.map(function(inp) { return inp.filePath; }),
                        product.Qt.qml.qmlPath);
                var cppFile;
                var listFile;
                try {
                    if (qmlInputs.length > 0)
                        cppFile = new TextFile(outputs["cpp"][0].filePath, TextFile.WriteOnly);
                    listFile = new TextFile(outputs["qt.qml.pluginlist"][0].filePath,
                                            TextFile.WriteOnly);
                    if (cppFile)
                        cppFile.writeLine("#include <QtPlugin>");
                    var plugins = { };
                    for (var p in scannerData) {
                        var plugin = scannerData[p].plugin;
                        if (!plugin || plugins[plugin])
                            continue;
                        plugins[plugin] = true;
                        var className = scannerData[p].classname;
                        if (!className) {
                            throw "QML plugin '" + plugin + "' is missing a classname entry. " +
                                  "Please add one to the qmldir file.";
                        }
                        if (cppFile)
                            cppFile.writeLine("Q_IMPORT_PLUGIN(" + className + ")");
                        var libs = Qml.getLibsForPlugin(scannerData[p],
                                                        product.Qt.core.qtBuildVariant,
                                                        product.qbs.targetOS,
                                                        product.qbs.toolchain,
                                                        product.Qt.core.libPath);
                        listFile.write(libs + ' ');
                    }
                } finally {
                    if (cppFile)
                        cppFile.close();
                    if (listFile)
                        listFile.close();
                };
            };
            return [cmd];
        }
    }
}
